@extends('layouts.app')

@section('title', 'product page')

@section('content')
<div class="container-product-page">
    <div class="product-img">
      <div class="product-main-img">
        <img class="mainx-img" src="/img/0.png" alt="">
      </div>
      <div class="product-imgs">
        <img onclick="changeProduct(this.src)" src="/img/1.png" alt="">
        <img onclick="changeProduct(this.src)" src="/img/2.png" alt="">
        <img onclick="changeProduct(this.src)" src="/img/3.png" alt="">

      </div>

    </div>
    <div class="product-text-button">
      <div class="product-text">
        <h2>Iphone 13 pro max</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Debitis nostrum dicta sapiente ea voluptas
          itaque rerum quas unde minus impedit. Lorem ipsum dolor
          sit amet consectetur adipisicing elit. Harum repellendus
          fugit, laboriosam illum possimus porro nesciunt ad repellat
          commodi maxime cumque id excepturi quia itaque doloribus
          accusantium ipsam corporis nam.</p>
      </div>
      <div class="product-button">
        <input type="submit" value="Add To Cart">
        <input type="submit" value="Buy Now">
        <input type="number" placeholder="Quantity:">

      </div>
    </div>

  <!-- </div> -->
</div>
@endsection
