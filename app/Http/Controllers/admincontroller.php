<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\message;
use App\Models\order;
use App\Models\user;
use App\Models\product;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    //
    function home(){
        $user=user::count();
        $product=product::count();
        $category=category::count();
        $orders=order::count();
        $order=order::get();
        // dd($order);

        return view('admin.dash',[
        'user'=>$user,
        'product'=>$product,
        'category'=>$category,
        'orders'=>$orders,
        'order'=>$order
        ]);
    }
    function product(){
        $products = Product::paginate(10);
        $categories=category::get();

        return view('admin.add_product',['products'=>$products,'categories'=>$categories]);
    }

    function categories(){
        $categories=category::get();

        return view('admin.categories',['categories'=>$categories]);

    }

    function message(){
        $message = message::get();
        // dd($message);
        return view('admin.message',['messages'=>$message]);
    }

}
