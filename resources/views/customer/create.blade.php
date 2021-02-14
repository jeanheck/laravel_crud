@extends('templates.template')

@section('content')
  <h1 class="text-center">Create new customer</h1>

  <div class="text-center">
    <a href="{{url("customers")}}">
      <i class="bi-arrow-left default-icon"></i>
    </a>
  </div>
  
  <div class="col-8 m-auto">
    <form name="customer" id="customer" method="POST" action="{{url('customers')}}">
      @csrf
      <input class="form-control" type="text" name="name" id="name" placeholder="Customer name"/>
      <input class="btn btn-primary" type="submit" value="Create"/>
    </form>
  </div>
@endsection