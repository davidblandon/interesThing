@extends('layouts.app')
@section('title', 'Home Page - eshop')
@section('content')
<div class="d-flex flex-wrap justify-content-center">
<div class="card mb-3" style="width: 12rem;">
    <img src="{{ asset('storage/' . $viewData['product']->getPhoto()) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $viewData['product']->getName() }}</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Price: {{ $viewData['product']->getPrice() }}</li>
        <li class="list-group-item">Description: {{ $viewData['product']->getDescription() }}</li>
        <li class="list-group-item">Category: {{ $viewData['product']->getCategory() }}</li>
        <li class="list-group-item">Seller: {{ $viewData['seller'] }}</li>
    </ul>
    <div class="card-body">
        <a href="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">Add to cart</a>
    </div>
</div>
<div class="d-flex flex-wrap justify-content-center">

@endsection