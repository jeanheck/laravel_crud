@extends('templates.template')

@section('content')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/common/form.css') }}" >

  <div class="row title">
    <div class="col-8">
      <h1>Create new customer</h1>
    </div>
    
    <div class="col-4">
      <div class="text-end">
        <a href="{{url("customers")}}">
          <i class="bi-arrow-left default-icon"></i>
        </a>
      </div>
    </div>
  </div>
  
  <form class="create" name="customer" id="customer" method="POST" action="{{url('customers')}}">
    @csrf
    <div class="row">
      <input class="form-control" type="text" name="name" id="name" placeholder="Customer name"/>
    </div>

    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
        <input class="btn btn-primary form-control" type="submit" value="Create"/>
      </div>
      <div class="col-4"></div>
    </div>
  </form>
@endsection