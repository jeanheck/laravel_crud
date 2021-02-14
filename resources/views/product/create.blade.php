@extends('templates.template')

@section('content')
  <h1 class="text-center">Create new product</h1>

  <div class="text-center">
    <a href="{{url("products")}}">
      <i class="bi-arrow-left default-icon"></i>
    </a>
  </div>
  
  <div class="col-8 m-auto">
    <form name="product" id="product" method="POST" action="{{url('products')}}">
      @csrf
      <input class="form-control" type="text" name="name" id="name" placeholder="Product name"/>
      <input class="form-control" type="decimal" name="price" id="price" placeholder="price"/>
      <input class="btn btn-primary" type="submit" value="Create"/>
    </form>
  </div>
@endsection