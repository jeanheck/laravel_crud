@extends('templates.template')

@section('content')
  <h1 class="text-center">See product details</h1>

  <div class="text-center">
    <a href="{{url("products")}}">
      <i class="bi-arrow-left default-icon"></i>
    </a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
      </tr>
    </tbody>
  </table>
@endsection