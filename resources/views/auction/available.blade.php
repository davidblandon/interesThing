<!-- Created By: Laura -->
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div style="position: absolute; top: 2; right: 7px;">
  <form action="{{ route('auction.avaliable') }}" method="GET">
    <div class="input-group">
      <div class="form-outline" data-mdb-input-init>
        <input type="search" name="search" id="form1" class="form-control" placeholder="Search" value="{{ request()->input('search') }}" />
      </div>
      <button type="submit" style="background-color: #71A06C" class="btn btn-primary" data-mdb-ripple-init>
        <i class="fas fa-search"></i>
      </button>
    </div>
  </form>
</div>
<div class="row">
  @foreach ($viewData["auctions"] as $auction)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('storage/' . $auction->getProduct()->getPhoto()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
      <h5 class="card-title">
      {{ $auction->getProduct()->getName() }}
      </h5>
      <p>
          The max offer is on: 
          @if ($maxOffer = $auction->getMaxOffer())
              {{ $maxOffer->getPrice() }}
          @else
          {{ __('Auction.auctions_not_available') }}
          @endif
      </p>
        <a href="{{ route('auction.show', ['id'=> $auction["id"]]) }}"
          class="btn custom-btn">{{ __('Auction.auctions_avilable') }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
