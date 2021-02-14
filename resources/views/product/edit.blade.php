@extends('templates.template')

@section('content')
  <h1 class="text-center">Edit product</h1>

  <div class="text-center">
    <a href="{{url("products")}}">
      <i class="bi-arrow-left default-icon"></i>
    </a>
  </div>
  
  <div class="col-8 m-auto">
    <form name="product" id="product" method="POST" action="{{url("products/$product->id")}}">
      @method('PUT')
      @csrf
      <input class="form-control" type="text" name="name" id="name" placeholder="Nome do cliente" value="{{$product->name}}"/>
      <input class="form-control" type="decimal" name="price" id="price" placeholder="Price" value="{{$product->price}}"/>
      <input class="btn btn-primary" type="submit" value="Save changes"/>
    </form>
  </div>
@endsection