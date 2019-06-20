<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;

class AuthController extends Controller
{
    public function redirectToFacebook(Request $request){
        return Socialite::with('facebook')->redirect();
    }

    public function redirectToGoogle(Request $request){
        return Socialite::with('google')->redirect();
    }

    public function HandleFacebookCallback(Request $request){
        $googleUser = Socialite::driver('facebook')->user();

        $userData = [
            'name' => $googleUser->name,
            'email' => ($googleUser->email) ?? '',
            'avatar' => $googleUser->avatar,
            'avatar_original' => $googleUser->avatar_original
        ];

        $user = User::firstOrCreate(
            ['auth_provider' => 'facebook',
            'auth_user_id' => $googleUser->id
        ],
          $userData

        );
        if($user){
            Auth()->login($user, true);
            return redirect()->to('home');
        }
    }

    public function HandleGoogleCallback(Request $request){
        $googleUser = Socialite::driver('google')->user();
        $userData = [
            'name' => $googleUser->name,
            'email' => ($googleUser->email) ?? '',
            'avatar' => $googleUser->avatar,
            'avatar_original' => ($googleUser->avatar_original) ?? ''
        ];

        $user = User::firstOrCreate(
            ['auth_provider' => 'google',
            'auth_user_id' => $googleUser->id
        ],
          $userData

        );
        if($user){
            Auth()->login($user, true);
            return redirect()->to('home');
        }
    }
}
