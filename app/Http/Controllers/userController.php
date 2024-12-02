<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\message;
use App\Models\product;
use App\Models\User;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function profile (){
        $name=auth()->user()->name;
        $email=auth()->user()->email;
        // $name=auth()->user()->name;
        // dd($name);
        return view('profile',['name'=>$name,'email'=>$email]);

    }

    function home(){
        $product=product::where('stock','>','0')->paginate('10');
        $category=category::all();

        return view('home',['products'=>$product,'categories'=>$category]);
    }

    function message(Request $request){

        $request->validate([
            'number' => 'required|digits:11',
        ]);

        message::create([
            'message'=>$request->input('message'),
            'user_id'=>auth()->user()->id,
            'phone'=>$request->input('number')
        ]);
        // dd();
        return redirect()->route('contact');



    }

}
