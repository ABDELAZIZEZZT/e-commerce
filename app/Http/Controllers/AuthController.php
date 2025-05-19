<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Mail\verificationMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            if(Auth::user()->email_verified_at==null){
                return redirect()->route('')->with('error','Please verify your email address');
            }
            return redirect()->intended('/');
        } else {

            return redirect()->route('login.view')->with('error', 'Invalid credentials');
        }
    }

    public function register(registerRequest $request)
    {
        // Create new user
        $verificationCode = rand(1000, 9999);

        $user = User::create([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'password' => bcrypt($request->getPassword()),
            'verification_code'=>$verificationCode,
        ]);

//        Mail::to($request->getEmail())->send(new verificationMail($verificationCode,$request->getName()));


        return view('verify')->with('email', $request->getEmail())->with('verificationCode', $verificationCode);
    }
    public function verify(Request $request){

        $email = $request->get('email');
        $user=User::where('email',$email)->first();
        if($user->verification_code==$request->input('verification_code')){
            $user->verification_code = null;
            $user->email_verified_at=now();
            $user->save();
            return redirect()->route('login.view')->with('success', 'Your email is verified. You can now login.');
        }else{
            return redirect()->back()->with('error', 'the code is not correct');
        }

    }

    function logout(){
        Auth::logout();
    return redirect()->route('login.view')->with('success', 'Logged out successfully.');
    }
}
