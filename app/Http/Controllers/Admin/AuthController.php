<?php
namespace App\Http\Controllers\Admin;

use App\Models\PasswordReset;
use App\Models\PendingUsers;
use App\Models\User;
use App\Services\PHPMailerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            'email' => 'required|string|email|max:255|unique:users|unique:pending_users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $otp = rand(100000, 999999); // Tạo OTP
        $otpExpiresAt = now()->addMinutes(15); // OTP expires after 15 minutes

        PendingUsers::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => $otp,
            'otp_expires_at' => $otpExpiresAt,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Gửi OTP qua email
        $subject = 'Verify Your Account';
        $body = "Your OTP is: $otp. It will expire in 15 minutes.";
        $test = $this->mailer->sendMail($request->email, $subject, $body);

//        var_dump($test);
//        die();

        return redirect()->route('verifyOtpForm')->with('success', 'OTP has been sent to your email.');
    }


    public function verifyOtpForm()
    {
        return view('clients.auth.register.verify_otp');
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'otp' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pendingUser = PendingUsers::
            where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('otp_expires_at', '>=', now())
            ->first();

        if (!$pendingUser) {
            return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP.'])->withInput();
        }

        // Move the data to the `users` table
        User::create([
            'name' => $pendingUser->name,
            'email' => $pendingUser->email,
            'password' => $pendingUser->password,
        ]);

        // Remove information from the `pending_users` table
        PendingUsers::where('email', $request->email)->delete();

        return redirect('/')->with('success', 'Your account has been verified successfully!');
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

        // Generate a new token
        $token = Str::random(60);

        // Check if an entry for this email already exists
        $passwordReset = PasswordReset::where('email', $request->email)->first();
        if ($passwordReset) {
            // Update the existing token and timestamp
            $passwordReset->update([
                'token' => $token,
                'updated_at' => now(),
            ]);
        } else {
            // Create a new record if it doesn't exist
            PasswordReset::create([
                'email' => $request->email,
                'token' => $token,
            ]);
        }

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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if (!$user) {
            sweetalert()->addError('Error', 'Email does not exist');
            return redirect()->back();
        }

        if (!Hash::check($password, $user->password)) {
            sweetalert()->addError('Error', 'Incorrect password');
            return redirect()->back();
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            sweetalert()->addSuccess('Success', 'Login successfully!');
            return redirect()->intended(url()->previous());
        }
        sweetalert()->addError('Error', 'Login failed!');
        return redirect()->back();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        sweetalert()->addSuccess('Success', 'Logout successfully!');
//        return redirect()->intended(url()->previous())->with('success', 'Logout successfully!');
        return redirect()->intended(url()->previous());
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
