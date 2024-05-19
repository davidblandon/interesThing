<!--Created By: Laura-->
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card" style="width: 12rem;">
  <img src="{{ asset('storage/' . $viewData["product"]->getPhoto()) }}" class="card-img-top" alt="...">
  <div class="card-body" style="background-color: #F9DE96">
    <h5 class="card-title">{{ $viewData["product"]["name"] }}</h5>
    <p class="card-text">{{ $viewData["product"]["description"] }}  </p>
    <p class="card-text">{{ $viewData["product"]["category"] }}</p>
    <p class="card-text">{{ $viewData["product"]["price"] }}</p>
    <p class="card-text">{{ $viewData["product"]->getSeller()->getName() }}</p>
    <a href="{{ route('product.avaliable') }}" style="background-color: #71A06C" class="btn btn-primary">Go back</a>
  </div>
</div>
@endsection


