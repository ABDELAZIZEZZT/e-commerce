@extends('layouts.app')

@section('title', 'orders')

@section('content')
<br><br><br><br><br>

<h2>Placed Orders</h2>
<div class="category-word">
    @isset($products)
    @foreach($products as $product)
    {{-- @dd($order->product->id) --}}

   <div class="latest-products-category">
     <div class="latest-products-content">

         <div class="latest-product">
           <img src={{asset("assets/project_images/".$product->image1)}} alt="">
           <h2>{{$product->name}}</h2>
           <h2>{{$product->price}}</h2>
            {{-- <form action={{route('order.delete')}} method="post">
                @method('DELETE')
                @csrf
                <button>delete this </button>
                <input type="hidden" name="product_id" value={{$product->id}}>
            </form> --}}
         </div>
     </div>

   </div>
   @endforeach
   <form action={{route('order.confirm')}} method="POST">
    @csrf
    <h2>the total price ={{$total_price}}</h2>
    <input type="hidden" name="price" value={{$total_price}}>
    <h4>the fax price ={{$fax}}</h4>
    <input type="hidden" name="product_id" value={{$product_id}}>

    <h4>the Price of products  ={{$total}}</h4>

    <button type="submit">confirm</button>
   </form>

    @endisset
  </div>
  <div class="not-yet">
    <h2>No Orders Placed Yet!</h2>
  </div>
@endsection
