@extends('layouts.app')

@section('title', $viewData['title'])

@section('profile-content')
<h2>{{ __('User.user_y_aucions') }}</h2>
<div class="row">
    @foreach ($viewData['auctions'] as $auction)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('storage/' . $auction->getProduct()->getPhoto()) }}" class="card-img-top img-card">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $auction->getProduct()->getName() }}</h5>
                <p>Current Bid: ${{ $auction->getMaxOffer()->getPrice() ?? 'No bids yet' }}</p>
                <a href="{{ route('auction.show', ['id' => $auction->getId()]) }}" class="btn custom-btn">{{ __('user.user_more') }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
