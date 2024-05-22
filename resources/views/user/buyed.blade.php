@extends('layouts.app')

@section('title', $viewData['title'])
@section('content')
<h2>{{ __('User.user_buyed') }}</h2>
<div class="row">
    @foreach ($viewData['products'] as $product)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('storage/' . $product->getPhoto()) }}" class="card-img-top img-card">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $product->getName() }}</h5>
                <p>{{ $product->getDescription() }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
