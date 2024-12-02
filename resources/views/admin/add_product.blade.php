@extends('layouts.adminApp')

@section('content')

{{-- @section('content') --}}


<div class="add-products">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
  <div class="add-product-word">
    <h2>ADD PRODUCT</h2>
  </div>

  <form action={{route("add.product")}} method="POST" enctype="multipart/form-data">
    @csrf

  <div class="flex">
    <div class="inputBox">
       <span>Product Name (required)</span>
       <input type="text" class="box" required="" maxlength="100" placeholder="enter product name" name="name" fdprocessedid="bwtcjs">
    </div>
    <div class="inputBox">
       <span>Product Price (required)</span>
       <input type="number" min="0" class="box" required="" max="9999999999" placeholder="enter product price"  name="price" fdprocessedid="jj9ayp">
    </div>
    <div class="inputBox">
        <span>stock (required)</span>
        <input type="number" min="0" class="box" required="" max="9999999999" placeholder="enter product price" name="stock" fdprocessedid="jj9ayp">
     </div>
    <div class="inputBox">
        <span>Image 01 (required)</span>
        <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required="">
    </div>
    <div class="inputBox">
        <span>Image 02 (required)</span>
        <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required="">
    </div>

     <div class="inputBox">
        <span>Product description (required)</span>
        <textarea placeholder="enter product details" name="description"></textarea>
    </div>
    <div class="inputBox">

        <span>category of this product (required)</span>
        <select name="category_id" id="category_id" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
  </div>

  <input type="submit" value="add product" class="btn-add-product">
</form>



</section>

<section class="show-products">

   <h1 class="heading">Products Added.</h1>
   @foreach ($products as $product)
   <div class="box-container">
        <div class="box">
            {{-- @dd('assets/project_images/'."$product->image1") --}}
            <img src={{asset('assets/project_images/'."$product->image1")}} alt="">
        <div class="name">{{$product->name}}</div>
        <div class="price">{{$product->price}}<span> $</span></div>
        <div class="details"><span>{{$product->description}}</span></div>

        <div class="flex-btn">
            <form action={{ route('update.product', ['id' => $product->id]) }} method="get">

                <input type="submit" value="update" class="btn-add-product">
            </form>
        </div>

        <div class="flex-btn">
        <form action={{route('delete.product', ['id' => $product->id])}} method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete" class="btn-add-product">
            </form>
        </div>
    </div>
</div>


    @endforeach

</section>
</div>
{{ $products->links() }}


@endsection
