@extends('layouts.app')

@section('title', $viewData['title'])
@section('profile-content')
<h2>Your Offers</h2>
<div class="row">
    @foreach ($viewData['offers'] as $offer)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $offer->getProduct()->getName() }}</h5>
                <p>Offered Price: ${{ $offer->getPrice() }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
