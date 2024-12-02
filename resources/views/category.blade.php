@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<br /><br /><br /><br /><br /><br /><br /><br /><br />
@if (session('successfully'))
    <div class="alert alert-success">
        {{ session('add to cart successfully') }}
    </div>
@endif


<div class="category-word">
   <h2>CATEGORY</h2>
 </div>

 <br /><br /><br />


<div class="category-word">
   <h2>Latest Products</h2>
 </div>
 <section class="latest-products-section">
    @foreach($products as $product)

   <div class="latest-products-category">
     <div class="latest-products-content">

         <div class="latest-product">
           <img src={{asset("assets/project_images/"."$product->image1")}} alt="">
           <h2>{{$product->name}}</h2>
           <h2>{{$product->price}}</h2>
            <form action={{route('add.cart')}} method="post">
                @csrf
                <input type="hidden" name="product_id" value={{$product->id}}>
                <button>Add To Cart</button>
            </form>
         </div>
     </div>

   </div>
   @endforeach
 </section>

@endsection


{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href={{asset("assets/c/style.css")}} />
  <link rel="stylesheet" href={{asset("assets/c/mobile.css")}} media="(max-width: 1100px)" />
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  <title>ex</title>
</head>

<body>
   <header class="header">
      <div class="logo">
        <a href="/"><h2>ZTECH</h2></a>
      </div>
      <form>
        <input type="text" placeholder="Search...." />
        <input  type="submit" value="search" />
      </form>
      <ul>
        <li class="main-list">
          <a class="main-links" href="/">home</a></li>
        <li class="main-list">
          <a class="main-links" href="/product">products</a>

        <li class="main-list"><a class="main-links" href="/orders">orders</a></li>
        <li class="main-list"><a class="main-links" href="/about">about</a></li>
        <li class="main-list"><a class="main-links" href="/contact">contact</a></li>
        @if (auth()->user()->role=='admin')
        <li class="main-list"><a class="main-links" href="/admin">admin</a></li>

        @endif

        <li class="user-icon">
            <a href="/profile">
              <i class="fas fa-user-group"> </i>
            </a>
            @if (auth()->user()==null)

               <div class="container-tap1">

                   <p>Login Or Register First!</p>
                   <form action={{route("login.view")}} method="GET">
                       <button class="login-btn">login</button>
                    </form>
                    <form action={{route("register.view")}} method="GET">
                       <button class="register-btn">register</button>
                    </form>
                </div>

            @endif

        </li>
        <li class="user-icon-shop">
          <a href="/cart">
            <i class="fa fa-shopping-cart"></i>
          </a>
        </li>
      </ul>
    </header>



  <footer class="footer">

    <section class="grid">

      <div class="box">
        <h3>Extra links</h3>
        <a href="#"> <i class="fas fa-angle-right"></i> Login</a>
        <a href="#"> <i class="fas fa-angle-right"></i> Register</a>
        <a href="#"> <i class="fas fa-angle-right"></i> Cart</a>
        <a href="#"> <i class="fas fa-angle-right"></i> Orders</a>
      </div>

      <div class="box">
        <h3>Contact Us.</h3>
        <a href="#"><i class="fas fa-phone"></i> +20 10586347</a>
        <a href="#"><i class="fas fa-phone"></i> +20 10586347</a>
        <a href="#"><i class="fas fa-envelope"></i> ztechphone@main.com</a>
        <a href="#"><i class="fas fa-map-marker-alt"></i> Menofia-Shebin-elkome </a>
      </div>

      <div class="box">
        <h3>Follow Us</h3>
        <a href="https://www.facebook.com/harshchaudharynp" target="_blank"><i
            class="fab fa-facebook-f"></i>facebook</a>
        <a href="#" target="_blank"><i class="fab fa-twitter"></i>Twitter</a>
        <a href="#" target="_blank"><i class="fab fa-instagram"></i>Instagram</a>
        <a href="#" target="_blank"><i class="fab fa-linkedin"></i>Linkedin</a>
      </div>

    </section>


    <script src="{{asset("assets/c")}}main.js"></script>

</body>

</html> --}}
