@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body" style="background-color: #F9DE96">
    <h5 class="card-title">{{ $viewData["product"]["name"] }}</h5>
    <p class="card-text">{{ $viewData["product"]["description"] }}  </p>
    <p class="card-text">{{ $viewData["product"]["photo"] }}</p>
    <p class="card-text">{{ $viewData["product"]["category"] }}</p>
    <p class="card-text">{{ $viewData["product"]["price"] }}</p>
    <p class="card-text">{{ $viewData["product"]->getSeller()->getName() }}</p>
    <a href="{{ route('cart.index') }}" style="background-color: #71A06C" class="btn btn-primary">Buy now</a>
  </div>
</div>
@endsection
<!--aquí van los containers con los productos-->

