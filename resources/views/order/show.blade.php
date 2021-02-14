@extends('templates.template')

@section('content')
  <h1 class="text-center">See order details</h1>

  <div class="text-center">
    <a href="{{url("orders")}}">
      <i class="bi-arrow-left default-icon"></i>
    </a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Customer name</th>
        <th scope="col">Products</th>
        <th scope="col">Total value</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$order->id}}</th>
        <td>{{$order->customer->name}}</td>
        <td>
          <ul>
            @foreach ($order->products as $product)
              <li>{{$product->name}} ({{$product->pivot->amount}} x {{$product->price}})</li>  
            @endforeach
          <ul> 
        </td>
        <td>{{$order->total}}</td>
      </tr>
    </tbody>
  </table>
@endsection