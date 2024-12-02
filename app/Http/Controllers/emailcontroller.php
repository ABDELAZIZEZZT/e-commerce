<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emailcontroller extends Controller
{
    //
    function reset(Request $request){
        dd($request->input('email'));
    }
}
