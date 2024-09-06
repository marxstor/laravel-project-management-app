<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    function login() {    
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    function loginUser(Request $request) {
        $validateUser = $request->validate([
            'email' => 'required|email', 
            'password' => 'required', 
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('auth.login')->with('error', 'Invalid email or password');
        
    }

    function signup() {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.signup');
    }

    function signupUser(Request $request) {
        $validateUser = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        User::create([
            'name' => $validateUser['name'],
            'email' => $validateUser['email'],
            'password' => Hash::make($validateUser['password']),
        ]);
        
        return redirect()->route('auth.login')->with('success', 'Account successfully created');
        // dd($request->email);
    }

    function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
