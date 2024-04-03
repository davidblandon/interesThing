@extends('layouts.app')
@section('title', 'Home Page - eshop')
@section('content')
@foreach($viewData["products"] as $product)
<div class="d-flex flex-wrap justify-content-center">
<div class="card mb-3" style="width: 12rem;">
    <img src="{{ asset('storage/' . $product->getPhoto()) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $product->getName() }}</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ __('listProduct.price') }} {{ $product->getPrice() }}</li>
    </ul>
    <div class="card-body">
    <a href="{{ route('product.show', ['id' => $product->getId()]) }}">{{ __('listProduct.details') }}</a>
    </div>
</div>
<div class="d-flex flex-wrap justify-content-center">
@endforeach
@endsection