@extends('layouts.app')
@section('title', 'Admin Dashboard - eshop')
@section('content')

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
                <div class="card-body">
                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}">See details</a>
                    <form action="{{ route('product.delete', ['id' => $product->getId()]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <h2>All Auctions</h2>
            @foreach($viewData["auctions"] as $auction)
            <div class="card mb-3" style="width: 12rem;">
                <img src="{{ asset('storage/' . $auction->getPhoto()) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $auction->getName() }}</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('auction.show', ['id' => $auction->getId()]) }}">See details</a>
                    <form action="{{ route('auction.delete', ['id' => $auction->getId()]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection