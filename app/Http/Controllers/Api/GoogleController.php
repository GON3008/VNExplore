<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                $token = $finduser->createToken('authToken')->plainTextToken;

                return response()->json(['token' => $token, 'user' => $finduser], 200);
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);
                $token = $newUser->createToken('authToken')->plainTextToken;

                return response()->json(['token' => $token, 'user' => $newUser], 200);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
