<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;

class cartcontroller extends Controller
{
    //
    function add_to_cart(Request $request){
        $id=$request->input("product_id");
        $product=product::find($id);
        $cart=cart::create([
            'product_id'=>$id,
            'user_id'=>auth()->user()->id,
        ]);

        return redirect()->back()->with('success','add to cart successfully');
    }
    function view_cart(){
        $id=auth()->user()->id;
        $product_id=cart::where('user_id','=',$id)->pluck('product_id');


        $product_ids_array = $product_id->toArray();
        $products = Product::whereIn('id', $product_id)->get();

        // dd($products->count());
        return view('cart',['products'=>$products]);
        // $product_id=
    }
    function delet_product($id){
        // dd($id);
       $product=cart::where('user_id',auth()->user()->id)
       ->Where('product_id',$id)->get();
    //    dd($product);
        $product->each->delete();
        return redirect()->back();
    }

    function delete_all_product(){
        $id=auth()->user()->id;
        $products=cart::where('user_id',$id)->get();
        if($products->count()==0){
            return redirect()->back()->with('error','no product yet');
        }

        $products->each->delete();
        return redirect()->back()->with('success','all product deleted');

    }
    function ckeckout_product(){
        $id=auth()->user()->id;
        // $cart_id=cart::where('user_id','=',$id)->get();
        $cart_id=cart::where('user_id','=',$id)->pluck('id');
        // dd($cart_id);
        $product_id=cart::where('user_id','=',$id)->pluck('product_id');


        $products = Product::whereIn('id', $product_id)->get();
        //  dd($products);

        $total=0;
        foreach($products as $product_price=>$price){
            $total+=$price->getAttributes()['price'];
        }
        // dd($total);
        $fax=$total*0.14;
        $total_price=$total+$fax;

        // dd($products);

        return view("cart_checkout",['product_id'=>$product_id,'total'=>$total,'fax'=>$fax,'total_price'=>$total_price,'products'=>$products]);




    }

}

