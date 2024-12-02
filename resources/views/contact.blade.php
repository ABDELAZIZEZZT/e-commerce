@extends('layouts.app')

@section('title', 'contact')

@section('content')
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<div class="form-container-all">

    <div class="form-container">
      <form action={{route('message')}} method="post">
        @csrf

        <h3>Contact Us</h3>
        <input type="number" name="number"  placeholder="enter your number" required="">

     <textarea name="message" class="box" placeholder="enter your message" cols="30" rows="10"></textarea>
        <input type="submit" value="Send Message" class="btn" name="submit" fdprocessedid="367ae" />
      </form>
    </div>

  </div>
@endsection
