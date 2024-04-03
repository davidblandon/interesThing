@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
    <div class="card-header">
        Shopping cart
    </div>
    <ul class="list-group list-group-flush">
    @foreach($viewData["cartProducts"] as $key => $product)
    <li class="list-group-item">    Id: {{ $key }}, Name: {{ $product["name"] }}, Price: {{ $product["price"] }}
    @endforeach
    </ul>
    </div>
    <div class="card-body">
    <form action="{{ route('orders.save') }}" method="post">
    @csrf
    <button type="submit">Buy all products</button>
</form>
    <a href="{{ route('cart.removeAll') }}">Remove all products from cart</a>
  </div>
</div>

@endsection