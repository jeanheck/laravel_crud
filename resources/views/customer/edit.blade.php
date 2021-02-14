@extends('templates.template')

@section('content')
  <h1 class="text-center">Edit customer</h1>

  <div class="text-center">
    <a href="{{url("customers")}}">
      <i class="bi-arrow-left default-icon"></i>
    </a>
  </div>
  
  <div class="col-8 m-auto">
    <form name="customer" id="customer" method="POST" action="{{url("customers/$customer->id")}}">
      @method('PUT')
      @csrf
      <input class="form-control" type="text" name="name" id="name" placeholder="Nome do cliente" value="{{$customer->name}}"/>
      <input class="btn btn-primary" type="submit" value="Save changes"/>
    </form>
  </div>
@endsection