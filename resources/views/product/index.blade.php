@extends('templates.template')

@section('content')
  <h1 class="text-center">Products</h1>

  <div class="text-center">
    <a href="{{url("products/create")}}">
      <i class="bi-plus-circle create-icon"></i>
    </a>
  </div>

  @csrf

  <div class="col-8 m-auto">
    <form name="search" id="search" method="GET" action="{{url('products')}}">
      <input class="form-control" type="text" name="name" id="name" placeholder="Product name"/>
      <input class="btn btn-primary" type="submit" value="Search"/>
    </form>
  </div>

  <div class="col-8 m-auto">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>
              <a href="{{url("products/$product->id")}}">
                <i class="bi-search default-icon"></i>
              </a>
              <a href="{{url("products/$product->id/edit")}}">
                <i class="bi-pencil edit-icon"></i>
              </a>
              <a href="{{url("products/$product->id")}}" class="jsdel">
                <i class="bi-trash delete-icon"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{$products->links()}}
  </div>

  <script src="{{url("js/product/index.js")}}"></script>
@endsection