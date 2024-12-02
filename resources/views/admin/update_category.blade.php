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

        <form action={{route('realy.update.category',['id'=>$category->id])}} method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
          <div class="image-container">
            <div class="main-image">
              <img  class="main-image-product" src={{asset('assets/project_images/'."$category->image")}} alt="">
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
            value={{$category->name}}
            fdprocessedid="j9w7hm"
          />

          <span>Update image 01</span>
          <input
            type="file"
            name="image1"
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
            <a href={{route('categories')}} class="option-btn">Go Back.</a>
          </div>
        </form>
      </section>
    </div>
@endsection

