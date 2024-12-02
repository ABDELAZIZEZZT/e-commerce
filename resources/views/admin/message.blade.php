@extends('layouts.adminApp')

@section('content')
<div class="content">

    </div>
    <div class="title-info">
      <p>messages</p>
      <i class="fas fa-table"></i>
    </div>
    <table>
      <thead>
        <tr>
          <th>message</th>
          <th>user</th>
          <th>phone</th>

        </tr>
      </thead>

      <tbody>
        @foreach($messages as $message)
        <tr>
            <td>{{$message->message}}</span></td>
          <td>{{$message->user->name}}</td>
          <td><span class="count">{{$message->phone}}</span></td>

        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
@endsection
