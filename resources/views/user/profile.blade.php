@extends('layouts.app')
@section('title', 'Admin Dashboard - eshop')
@section('content')
<div class='content'>
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Profile information</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $viewData['user']->getName() }}</h6>
        <p class="card-text">{{$viewData['user']->getEmail()}}</p>
        <p class="card-text">{{$viewData['user']->getPhone()}}</p>
    </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>All Products</h2>
            @foreach($viewData["products"] as $product)
            <div class="card mb-3" style="width: 12rem;">
                <img src="{{ asset('storage/' . $product->getPhoto()) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->getName() }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price: {{ $product->getPrice() }}</li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('product.detail', ['id' => $product->getId()]) }}">See details</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <h2>All Auctions</h2>
            @foreach($viewData["auctions"] as $auction)
            <div class="card mb-3" style="width: 12rem;">
                <img src="{{ asset('storage/' . $auction->product()->getPhoto()) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $auction->product()->getName() }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price: {{ $auction->maxOffer() }}</li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('auction.detail', ['id' => $auction->getId()]) }}">See details</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <h2>All Orders</h2>
            @foreach($viewData["orders"] as $order)
            <div class="card mb-3" style="width: 12rem;">
                <img src="{{ asset('storage/' . $order->product()->getPhoto()) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $order->getId() }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price: {{ $order->getTotal() }}</li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('order.detail', ['id' => $order->getId()]) }}">See details</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection