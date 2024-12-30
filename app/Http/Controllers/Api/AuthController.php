<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
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

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'avatar' => $request->input('avatar'),
            'role' => 'client',
            'is_verified' => 0,
            'is_active' => 1,
            'is_admin' => 0,
            'deleted' => 1,
        ]);

        return response()->json(['message' => 'Registered successfully', 'user' => $user], 201);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->input('email'))->first();

        //check user does not exist

        if (!$user) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

//         check user status = 0 or deleted = 0
        if ($user->status == 0 || $user->deleted == 0) {
            return response()->json(['error' => 'Account is inactive or deleted'], 403);
        }

        $credentials = $request->only('email', 'password');

        try {
            // check login information and get generate token
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

//        var_dump($user);
//        die();

        // get user information
//        $user = Auth::user();
        $user->update(['jwt_token' => $token]);

        if (!$user->wasChanged('jwt_token')) {
            return response()->json(['error' => 'Could not save token'], 500);
        }

//        $userSession = UserSession::create([
//            'user_id' => $user->id,
//            'jwt_token' => $user->token,
//            'ip_address' => $user->ip(),
//            'user_agent' => $user->header('User-Agent'),
//            ''
//        ]);

        return response()->json([
            'status' => true,
            'message' => 'Login successfully',
            'data' => [
                'user' => $user,
                'jwt_token' => $token
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        try {
            // get information from token before invalidation
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json(['error' => 'User not found or already logged out'], 404);
            }
            // disable current token
            JWTAuth::invalidate(JWTAuth::getToken());

            // delete jwt_token in db
            $user->update(['jwt_token' => null]);

            return response()->json(['message' => 'Logged out successfully'], 200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not log out', 'details' => $e->getMessage()], 500);
        }
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['error' => 'Email not found'], 404);
        }

        // Generate token for password reset
        $token = Str::random(60);
        PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
        ]);

        // Prepare email content
        $resetLink = url("api/password/reset/{$token}");
        $subject = 'Password Reset Request';
        $body = "<p>Click the link below to reset your password:</p><a href='{$resetLink}'>Reset Password</a>";

        // Send the reset email (use your PHPMailer service here)
        $sent = $this->mailer->sendMail($request->email, $subject, $body);

        if ($sent) {
            return response()->json(['message' => 'Password reset link has been sent to your email.'], 200);
        } else {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|confirmed|min:8',
            'token' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check the password reset token
        $passwordReset = PasswordReset::where('token', $request->token)->where('email', $request->email)->first();

        if (!$passwordReset) {
            return response()->json(['error' => 'Invalid or expired token.'], 400);
        }

        // Update user password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the password reset token
        $passwordReset->delete();

        return response()->json(['message' => 'Password has been reset successfully.'], 200);
    }
}

