@extends('layouts.adminApp')

@section('content')
<div class="content">
    <div class="title-info">
      <p>dachboard</p>
      <i class="fas fa-chart-bar"></i>
    </div>

    <div class="data-info">
      <div class="box">
        <i class="fas fa-user"></i>
        <div class="data">
          <p>user</p>
          <span>{{$user}}</span>
        </div>
      </div>

      <div class="box">
        <i class="fas fa-pen"></i>
        <div class="data">
          <p>Orders</p>
          <span>{{$orders}}</span>
        </div>
      </div>
      <div class="box">
        <i class="fas fa-table"></i>
        <div class="data">
          <p>products</p>
          <span>{{$product}}</span>
        </div>
      </div>

    </div>
    <div class="title-info">
      <p>orders</p>
      <i class="fas fa-table"></i>
    </div>
    <table>
      <thead>
        <tr>
          <th>product</th>
          <th>price</th>
          <th>status</th>
          <th>user</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order as $o)
        <tr>
          <td>{{$o->product->name}}</td>
          <td><span class="price">{{$o->price}}$</span></td>
          <td><span class="count">{{$o->status}}</span></td>
          <td><span class="user">{{$o->user->name}}</span></td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
@endsection
