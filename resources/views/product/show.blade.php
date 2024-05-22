<!--Created By: Laura-->
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="card" style="width: 18rem;">
  <img src="{{ asset('storage/' . $viewData["product"]->getPhoto()) }}" class="card-img-top" alt="Product Image">
  <div class="card-body" style="background-color: #F9DE96">
    <h5 class="card-title">{{ $viewData["product"]["name"] }}</h5>
    
    <h6>{{ __('Product.product_desc') }}</h6>
    <p class="card-text">{{ $viewData["product"]["description"] }}</p>
    
    <h6>{{ __('Product.product_cat') }}</h6>
    <p class="card-text">{{ $viewData["product"]["category"] }}</p>
    
    <h6>{{ __('Product.product_pri') }}</h6>
    <p class="card-text">${{ $viewData["product"]["price"] }}</p>
    
    <h6>{{ __('Product.product_sell') }}</h6>
    <p class="card-text">{{ $viewData["product"]->getSeller()->getName() }}</p>
    
    <a href="{{ route('product.avaliable') }}" style="background-color: #71A06C" class="btn btn-primary">{{ __('Product.product_back') }}</a>
  </div>
</div>
@endsection
