@extends('templates.template')

@section('content')
  <form method="GET" action="{{url('customers')}}">
    <div class="row row-cols align-items-center">
      <div class="col-4" style="min-width: 150px;">
        <h1 class="text-left">Customers</h1>
      </div>
      <div class="col-4">
        <input class="form-control" type="text" name="name" id="name" placeholder="Customer name" value="{{$filteredName}}"/>
      </div>
      <div class="col-2">
        <input class="btn btn-primary" type="submit" value="Search"/>
      </div>
      <div class="col text-end">
        <a href="{{url("customers/create")}}">
          <i class="bi-plus-circle create-icon"></i>
        </a>
      </div>
    <div>
  </form>

  @csrf

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col" colspan="2">Name</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($customers as $customer)
        <tr>
          <th scope="row">{{$customer->id}}</th>
          <td>{{$customer->name}}</td>
          <td class="text-end">
            <a href="{{url("customers/$customer->id")}}" class="btn btn-outline-dark jsshow" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="bi-search default-icon"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Show customer data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form name="EditCustomerForm" id="EditCustomerForm" method="POST">
          @method('PUT')
          @csrf

          <div class="modal-body">
            <div class="row">
              <input class="form-control" type="text" name="EditCustomerName" id="EditCustomerName" placeholder="Customer name"/>
            </div>
          </div>
          <div class="modal-footer">
            <div class="text-end">
              <a class="btn btn-danger jsdel" role="button" name="DeleteCustomer" id="DeleteCustomer">Delete</a>
            </div>
            <div class="text-right">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{$customers->appends(['name' => $filteredName])->links()}}

  <script src="{{url("js/customer/index.js")}}"></script>
@endsection