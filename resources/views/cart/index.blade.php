@extends('layouts.app')

@section("title", $viewData["title"])


@section('content')

<div class="container">

<div class="row justify-content-center">

<div class="col-md-12">


<ul>



</ul>

</div>

</div>

<div class="row justify-content-center">

<div class="col-md-12">

<h1>Products in cart</h1>

<ul>

@foreach($viewData["cartProducts"] as $key => $product)

<li>

Id: {{ $key }} -

Name: {{ $product["name"] }} -

Price: {{ $product["price"] }}

</li>

@endforeach

</ul>

<a href="{{ route('cart.removeAll') }}">Remove all products from cart</a>
<form action="{{ route('order.create') }}" method="POST">
    @csrf
    <button type="submit">Pay</button>
</form>

</div>

</div>

</div>

@endsection