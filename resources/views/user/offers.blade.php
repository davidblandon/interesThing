@extends('layouts.app')

@section('title', $viewData['title'])
@section('content')
<h2>{{ __('User.user_y_offers') }}</h2>
<div class="row">
    @foreach ($viewData['offers'] as $offer)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $offer->getAuction()->getProduct()->getName() }}</h5>
                <p>{{ __('User.user_price') }} ${{ $offer->getPrice() }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
