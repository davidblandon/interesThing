<!--Created By: Laura-->
@extends('layouts.app')

@section("title", $viewData["title"])

@section('content')

<div class="container" style="margin-top: 80px; color: black;">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="border: none; background-color: #F9DE96;">
                <div class="card-body text-center">
                    @if(count($viewData["cartProducts"]) > 0)
                        <h1 class="card-title" style="color: inherit;">Products in Cart</h1>
                        <ul style="list-style: none;">
                            @foreach($viewData["cartProducts"] as $product)
                                <li>
                                    <strong>Id:</strong> {{ $product->getId() }} - 
                                    <strong>Name:</strong> {{ $product->getName() }} - 
                                    <strong>Price:</strong> {{ $product->getPrice() }} - 
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-3">
                            <form  method="POST" action="{{ route('order.create') }}">
                                @csrf

                                <!-- Botón para enviar el formulario -->
                                <button style="background-color: #71A06C; color: #ffffff" type="submit">Pay {{ $viewData["total"] }}</button>
                            </form>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('cart.removeAll') }}" class="btn btn-danger">Remove All Products from Cart</a>
                        </div>
                    @else
                        <h1 class="card-title">Your cart is empty</h1>
                        <div class="text-center">
                            <div class="mt-3">
                                <a href="{{ route('product.available') }}" style="background-color: #71A06C" class="btn btn-primary">View products</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
