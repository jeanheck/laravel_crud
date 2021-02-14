@extends('templates.template')

@section('content')
  <h1 class="text-center">Orders</h1>

  <div class="text-center">
    <a href="{{url("orders/create")}}">
      <i class="bi-plus-circle create-icon"></i>
    </a>
  </div>

  @csrf

  <div class="col-12 m-auto">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Customer name</th>
          <th scope="col">Products</th>
          <th scope="col">Total value</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
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
            <td>
              <a href="{{url("orders/$order->id")}}">
                <i class="bi-search default-icon"></i>
              </a>
              <a href="{{url("orders/$order->id/edit")}}">
                <i class="bi-pencil edit-icon"></i>
              </a>
              <a href="{{url("orders/$order->id")}}" class="jsdel">
                <i class="bi-trash delete-icon"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{$orders->links()}}
  </div>

  <script src="{{url("js/order/index.js")}}"></script>
@endsection