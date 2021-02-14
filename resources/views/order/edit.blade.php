@extends('templates.template')

@section('content')
  <h1 class="text-center">Edit order</h1>

  <div class="text-center">
    <a href="{{url("orders")}}">
      <i class="bi-arrow-left default-icon"></i>
    </a>
  </div>
  
  <div class="col-8 m-auto">
    <form name="order" id="order" method="POST" action="{{url("orders/$order->id")}}">
      @method('PUT')
      @csrf

      <select class="form-control" name="customer" id="customer">
        @foreach ($customers as $customer)
          <option value="{{$customer->id}}" {{$customer->id == $order->customer->id ? 'selected' : ''}}>
            {{$customer->name}}
          </option>
        @endforeach
      </select>

      <div class="container row m-auto">
        <div class="col-4">
          <select class="form-control" name="product" id="product">
            @foreach ($products as $product)
              <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-2">
          <input class="form-control" type="number" id="amount" name="amount">
        </div>
        <div class="col-2">
          <a href="#" id="add" name="add">
            <i class="bi-plus-circle default-icon"></i>
          </a>
        </div>
      </div>
    
      <div class="container" id="productsList" name="productsList">
        <!-- -->
      </div>

      <input class="btn btn-primary" type="submit" value="Save changes"/>
    </form>
  </div>

  <script>
    const productsData = "{{$products}}";
    const productsAtOrder = "{{$order->products}}";
  </script>

  <script src="{{url("js/order/edit.js")}}"></script>
@endsection