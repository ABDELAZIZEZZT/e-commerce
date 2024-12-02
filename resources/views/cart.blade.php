@extends('layouts.app')

@section('title', 'cart')

@section('content')
<br /><br /><br /><br /><br /><br /><br /><br /><br />





<div class="category-word">
  <h2>SHOPPING CART</h2>
</div>

<section class="latest-products-section">
  <div class="latest-products-category">
    <div class="latest-products-content">
        @foreach($products as $product)
      <div class="latest-product">

        <img src={{asset('assets/project_images/'."$product->image1")}} alt="">
        <h2>{{$product->name}}</h2>
        <h2>{{$product->price}} $</h2>
        <h2>{{$product->description}}</h2>
        <form action={{route('product.delet',['id'=>$product->id])}} method="post">
            @csrf
            @method('delete')
            <button>Delete</button>
        </form>

        @endforeach

      </div>
    </div>
  </div>


</section>
<section class="latest-products-section0">
  <div class="latest-products-category0">
    <div class="latest-products-content0">

      <div class="latest-product0">


        <a href="{{route('home')}}" class="option-btn">Continue Shopping.</a>
        <a href="{{route('product.delet.all')}}" class="delete-btn " onclick="return confirm('delete all from cart?');">Delete All Items ?</a>
        <a href="{{route('product.checkout')}}" class="btn">Proceed to Checkout.</a>

      </div>
    </div>
  </div>
</section>
@endsection
