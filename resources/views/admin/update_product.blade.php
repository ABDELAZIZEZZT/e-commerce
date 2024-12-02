@extends('layouts.adminApp')

@section('content')

@if ($errors->any())
    <script>
        alert("{{ $errors->first() }}");
    </script>
@endif

    <div class="content">
      <section class="update-product">
        <h1 class="heading">Update Product</h1>

        <form action={{route('realy.update.product',['id'=>$product->id])}} method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
          <div class="image-container">
            <div class="main-image">
              <img  class="main-image-product" src={{asset('assets/project_images/'."$product->image1")}} alt="">
            </div>
            <div class="sub-image">
              <img
                onclick="changeProduct(this.src)"
                src={{asset('assets/project_images/'."$product->image2")}}
                alt=""
              />

            </div>
          </div>

          <span>Update Name</span>
          <input
            type="text"
            name="name"
            required=""
            class="box"
            maxlength="100"
            placeholder="enter product name"
            value={{$product->name}}
            fdprocessedid="j9w7hm"
          />
          <span>Update Price</span>
          <input
            type="number"
            name="price"
            required=""
            class="box"
            min="0"
            max="9999999999"
            placeholder="enter product price"
            onkeypress="if(this.value.length == 10) return false;"
            value={{$product->price}}
            fdprocessedid="nqokq"
          />
          <span>Update Details</span>
          <textarea name="description" class="box" required="" cols="30" rows="10">
            {{$product->description}}
          </textarea
          >
          <div class="inputBox">
            <span>stock (required)</span>
            <input type="number" min="0" class="box" required="" max="9999999999" placeholder="stock" name="stock" fdprocessedid="jj9ayp" value={{$product->stock}}>
         </div>
          <span>Update image 01</span>
          <input
            type="file"
            name="image1"
            accept="image/jpg, image/jpeg, image/png, image/webp"
            class="box"
          />
          <span>Update image 02</span>
          <input
            type="file"
            name="image2"
            accept="image/jpg, image/jpeg, image/png, image/webp"
            class="box"
          />

          <div class="flex-btn">
            <input
              type="submit"
              name="update"
              class="btn-update"
              value="update"
              fdprocessedid="ic1j3bq"
            />
            <a href={{route('product')}} class="option-btn">Go Back.</a>
          </div>
        </form>
      </section>
    </div>
@endsection

