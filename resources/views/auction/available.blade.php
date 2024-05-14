@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["auctions"] as $auction)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
      <div class="card-body text-center">
      <h5 class="card-title">
      {{ $auction->getProduct()->getName() }}
      </h5>
      <p>
          The max offer is on: 
          @if ($maxOffer = $auction->getMaxOffer())
              {{ $maxOffer->getPrice() }}
          @else
              No offers available
          @endif
      </p>
        <a href="{{ route('auction.show', ['id'=> $auction["id"]]) }}"
          class="btn bg-primary text-white">See more</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
