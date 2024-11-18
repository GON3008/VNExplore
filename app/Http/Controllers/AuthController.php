<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\PasswordReset;
use App\Services\PHPMailerService;
use Illuminate\Support\Str;
class AuthController extends Controller
{

    protected $mailer;

    public function __construct(PHPMailerService $mailer)
    {
        $this->mailer = $mailer;
    }
    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $existingUser = User::where('email', $request->input('email'))->first();
        if($existingUser) {
            return redirect()->back()
                ->withErrors(['email' => 'Email already exists.'])
                ->withInput();
        }

        $existingUser = User::where('phone', $request->input('phone'))->first();
        if($existingUser) {
            return redirect()->back()
                ->withErrors(['phone' => 'Phone already exists.'])
                ->withInput();
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'avatar' => $request->input('avatar'),
            // Set default values for the fields not included in the form
            'role' => 'client',
            'is_verified' => 0,
            'is_active' => 1,
            'is_admin' => 0,
            'deleted' => 1,
        ]);

        return redirect()->intended(url()->previous())->with('success', 'Register successfully!');
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email not found.');
        }

        // Generate token and save it
        $token = Str::random(60);
        PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
        ]);

        // Prepare email content
        $resetLink = url("password/reset/{$token}");
        $subject = 'Password Reset Request';
        $body = "<p>Click the link below to reset your password:</p><a href='{$resetLink}'>Reset Password</a>";

        // Send email
        $sent = $this->mailer->sendMail($request->email, $subject, $body);

        if ($sent) {
            return redirect()->back()->with('success', 'Password reset link has been sent to your email.');
        } else {
            return redirect()->back()->with('error', 'Failed to send email.');
        }
    }

    public function showResetPasswordForm($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset) {
            return redirect('/password/forgot')->withErrors(['error' => 'Invalid or expired token.']);
        }

        return view('clients.auth.forgot_password.forgot_pw', [
            'token' => $token,
            'email' => $passwordReset->email
        ]);
//        return view('clients.auth.forgot_password.forgot_pw', ['token' => $token]);
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $passwordReset = PasswordReset::where('token', $request->token)->where('email', $request->email)->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid or expired token.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the token after successful password reset
        $passwordReset->delete();

        return redirect('/')->with('success', 'Password has been updated successfully.');
    }

    public function login()
    {
        return view('clients.home.index');
    }

    public function loginPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
//            return response()->json(['success' => true, 'redirect' => url('home')]);
//            return redirect('/')->with('success', 'Login successfully!');
            return redirect()->intended(url()->previous())->with('success','Login successfully!');
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended(url()->previous())->with('success', 'Logout successfully!');
    }

    public function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'string|email|'
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    }
}
