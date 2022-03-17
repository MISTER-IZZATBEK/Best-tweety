<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
// Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this -> _registerOrLoginUser($user);
        //Return home after login
        return redirect()->route('home');
    }

    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
// Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this -> _registerOrLoginUser($user);
        //Return home after login
        return redirect()->route('home');
    }

    // Github login
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
// Github callback
    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->user();
        $this -> _registerOrLoginUser($user);
        //Return home after login
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser( $data)
    {
        $user=User::where('email', '=', $data->email)->first();
        if(!$user){
            $user=new User();
            $user->username=$data->username;
            $user->name=$data->name;
            $user->email=$data->email;
            $user->provider_id=$data->id;
            $user->avatar=$data->avatar;
            $user->save();
        }
        Auth::login($user);
    }
}
