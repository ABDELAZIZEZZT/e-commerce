@extends('layouts.app')

@section('title', 'register')

@section('content')
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<div class="form-container-all">

<div class="form-container">
 <form action={{route('register')}} method="post">
   @if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif
   @csrf
   <h3>Register Now</h3>
   <input
     type="text"
     name="name"
     required=""
     placeholder="enter your username"
     maxlength="20"
     class="box"
     fdprocessedid="piotnh"
   />
   <input
     type="email"
     name="email"
     required=""
     placeholder="enter your email"
     maxlength="50"
     class="box"
     oninput="this.value = this.value.replace(/\s/g, '')"
     fdprocessedid="fqcr2j"
   />
   <input
     type="password"
     name="password"
     required=""
     placeholder="enter your password"
     maxlength="20"
     class="box"
     oninput="this.value = this.value.replace(/\s/g, '')"
     fdprocessedid="bdyt3h"
   />
   <input
     type="password"
     name="password_confirmation"
     required=""
     placeholder="confirm your password"
     maxlength="20"
     class="box"
     oninput="this.value = this.value.replace(/\s/g, '')"
     fdprocessedid="8watih"
   />
   <input
     type="submit"
     value="register now"
     class="btn"
     name="submit"
     fdprocessedid="367ae"
   />
   <p>Already have an account?</p>
   <a href="/login" class="option-btn">Login Now</a>
  </div>
   </div>
</section>
@endsection
