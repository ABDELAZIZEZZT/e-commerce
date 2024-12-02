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

  <form action={{route("add.category")}} method="POST" enctype="multipart/form-data">
    @csrf

  <div class="flex">
    <div class="inputBox">
       <span>category Name (required)</span>
       <input type="text" class="box" required="" maxlength="100" placeholder="enter product name" name="name" fdprocessedid="bwtcjs">
    </div>
    <div class="inputBox">
        <span>Image (required)</span>
        <input type="file" name="image1" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required="">
    </div>

  </div>

  <input type="submit" value="add category" class="btn-add-product">
</form>



</section>

<section class="show-products">

   <h1 class="heading">categories Added.</h1>
   @foreach ($categories as $category)
   <div class="box-container">
        <div class="box">
            {{-- @dd('assets/project_images/'."$product->image1") --}}
            <img src={{asset('assets/project_images/'."$category->image")}} alt="">
        <div class="name">{{$category->name}}</div>

        <div class="flex-btn">
            <form action={{ route('update.category', ['id' => $category->id]) }} method="get">

                <input type="submit" value="update" class="btn-add-product">
            </form>
        </div>

        <div class="flex-btn">
        <form action={{route('delete.category', ['id' => $category->id])}} method="post">
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



@endsection
