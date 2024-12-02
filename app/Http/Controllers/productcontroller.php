<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    //
    function add_product(Request $request){

        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image_01' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_02' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|integer|',
        ]);

        // dd($request->all());

        $name = $validatedData['name'];
        $price = $validatedData['price'];
        $image_01 = $request->file('image_01')->getClientOriginalName();
        $image_02 = $request->file('image_02')->getClientOriginalName();
        $description = $validatedData['description'];
        $stock = $validatedData['stock'];
        $category_id = $validatedData['category_id'];
        // dd($category_id);


        // dd($image_01);

        $product=product::create([
            'name'=>$name,
            'category_id'=>$category_id,
            'price'=>$price,
            'image1'=>$image_01,
            'image2'=>$image_02,
            'description'=>$description,
            'stock'=>$stock,]
        );
        return redirect()->route('product')->with('Success','the product added successfully');


    }
    function update_product($id){
       $product=product::find($id);
       return view('admin.update_product',['product'=>$product]);
    }

    function delete_product(Request $request,$id){
        $product=product::find($id);
        $product->delete();
       return redirect()->route('product');
    }
    function realy_update_product(Request $request,$id){
        $product=product::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image1' => '|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image2' => '|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);
        // dd(request($request->file('image1')));
        if($request->file('image1')!=null){
            $product->image1=$request->file('image1')->getClientOriginalName();
        }
        if($request->file('image2')!=null){
            $product->image2=$request->file('image1')->getClientOriginalName();
        }

        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->stock=$request->input('stock');
        $product->save();
        return redirect()->route('product')->with('Success','the product added successfully');


    }

    function search(Request $request){
        $query = $request->input('search');
        // dd($query);

        $results = product::where('name', 'like', "%$query%")->get();
        // dd($results);
        $category=category::all();

        return view('home',['products'=>$results,'categories'=>$category]);
    }
}
