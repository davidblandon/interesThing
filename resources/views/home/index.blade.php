@extends('layouts.app')
@section('title', 'Home Page - eshop')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src='https://i.ibb.co/gd84j1R/Logo.png' class="img-fluid rounded-start" alt="Logo image">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ __('index.welcome') }}</h5>
        <p class="card-text">{{ __('index.text') }}</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection

