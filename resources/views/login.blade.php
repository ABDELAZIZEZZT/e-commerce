@extends('layouts.app')

@section('title', 'login')

@section('content')
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="form-container-all">
<div class="form-container">
<form action="{{route("login")}}" method="post">
    @csrf
    <h3>Login Now</h3>
    <input
    type="email"
    name="email"
    required=""
    placeholder="enter your email"

    class="box"
    fdprocessedid="piotnh"
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
    type="submit"
    value="Login"
    class="btn"
    name="submit"
    fdprocessedid="367ae"
    />
    <p>Forget password !!</p>
    <a href="/reset/view" class="option-btn">Reset Password</a>
</form>
</div>
</div>
</section>
@endsection
