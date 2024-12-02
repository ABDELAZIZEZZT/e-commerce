<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/');
        } else {

            return redirect()->route('login.view')->with('error', 'Invalid credentials');
        }
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

            'password.confirmed' => 'The password confirmation does not match.'
        ]);

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return redirect('/login')->with('success', 'Registration successful!');
    }

    function logout(){
        Auth::logout();
    return redirect()->route('login.view')->with('success', 'Logged out successfully.');
    }
}
