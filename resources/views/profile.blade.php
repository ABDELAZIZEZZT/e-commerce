@extends('layouts.app')

@section('title', 'profile')

@section('content')
<br /><br /><br /><br /><br /><br /><br /><br /><br />

<div class="update-info-user-container">
     <div class="user-name-info">
        <h2>WELCOME</h2>
        <h2>{{$name}}</h2>


     </div>
     <div class="e-mail-info">
       <input type="email" placeholder="{{$email}}">
       <button>update</button>
     </div>
     <div class="password-info">
       <input type="password" placeholder="old password">
       <input type="password" placeholder="new password">
       <input type="password" placeholder="new password again">
       <button>update</button>
       <li class="main-list"><a class="main-links" href="/logout">logout</a></li>
     </div>

</div>
@endsection
