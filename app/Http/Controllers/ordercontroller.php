<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;

class ordercontroller extends Controller
{
    //

    function order(){
        $id=auth()->user()->id;
        $orders=order::where('user_id',$id)->get();
        // dd($orders);

        return view('order',['orders'=>$orders]);

    }

    function confirm_order(Request $request){
        $product_id=$request->input('product_id');
        $product_ids = json_decode($product_id);
        // dd($cart);

        // dd($product_ids);

        foreach ($product_ids as $product){
            order::create([
                'product_id'=>$product,
                'user_id'=>auth()->user()->id,
                'price'=>$request->input('price'),
                'status'=>'pendeng',
            ]);
        }
        $products=cart::whereIn('product_id',$product_ids)->get();
        if($products->count()==0){
            return redirect()->back()->with('error','no product yet');
        }
        $products->each->delete();
        return redirect()->route('order');

    }

    function delete_order(Request $request){
        $product_id=$request->input('product_id');
        $order=order::where('product_id',$product_id)->get();
        // dd($order);
        $order->each->delete();
        return redirect()->route('order');

    }
}
