<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{

    function category($id){
       $products=product::where('category_id',$id)->get();
    //    dd($products);
       return view('category',['products'=>$products]);
    }
    //

    function add_category(Request $request){


            // dd($request->all());
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'image1' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            // dd($request->all());

            $name = $validatedData['name'];

            $image = $request->file('image1')->getClientOriginalName();



            // dd($image);

            $category=category::create([
                'name'=>$name,
                'image'=>$image
                ]
            );
            return redirect()->route('categories')->with('Success','the category added successfully');



    }
    function update_category($id){
        $category=category::find($id);
        return view('admin.update_category',['category'=>$category]);
    }

    function realy_update_category(Request $request,$id){
        $category=category::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'image1' => '|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

        ]);
        // dd(request($request->file('image1')));
        if($request->file('image1')!=null){
            $category->image=$request->file('image1')->getClientOriginalName();
        }


        $category->name=$request->input('name');
        $category->save();
        return redirect()->route('categories')->with('Success','the category added successfully');
    }

    function delete_category(Request $request,$id){
        $category=category::find($id);
        $category->delete();
       return redirect()->route('categories');
    }




}
