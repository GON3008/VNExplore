<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
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
            'role' => 'user',
            'is_verified' => false,
            'is_active' => true,
            'is_admin' => false,
            'deleted' => false,
        ]);

        return redirect()->intended(url()->previous())->with('success', 'Register successfully!');
    }

    public function login()
    {
        return view('clients.auth.login.modal_form_login');
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
}
