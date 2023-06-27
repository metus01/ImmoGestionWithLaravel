<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Property;
use App\Models\User;
use App\Notifications\LoginRequestNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
            /** User $user */
            $user  = User::findOrFail(4);
            $user->notif(new LoginRequestNotification(Property::first()));

        }
        return back()->withErrors(
            [
                'email' => 'Identifiants Incorrects'
            ]
            )->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success' , 'You are Logout');
    }
}
