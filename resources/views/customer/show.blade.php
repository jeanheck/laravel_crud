@extends('templates.template')

@section('content')
  <h1 class="text-center">See customer details</h1>

  <div class="text-center">
    <a href="{{url("customers")}}">
      <i class="bi-arrow-left default-icon"></i>
    </a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$customer->id}}</th>
        <td>{{$customer->name}}</td>
      </tr>
    </tbody>
  </table>
@endsection