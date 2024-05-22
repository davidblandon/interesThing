<!--Created By: Laura-->
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $viewData['auction']->getProduct()->getPhoto()) }}" class="img-fluid rounded-start" alt="Product Image">
        </div>
        <div class="col-md-8">
            <div class="card-body" style="background-color: #F9DE96">
                <h5 class="card-title">{{ $viewData["auction"]->getProduct()->getName() }}</h5>
                
                <!-- Título para la fecha límite de la subasta -->
                <h6>{{ __('Auction.auction_limit_date') }}</h6>
                <p class="card-text">{{ $viewData["auction"]->getLimitDate() }}</p>
                
                <!-- Título para el precio base de la subasta -->
                <h6>{{ __('Auction.auction_base') }}</h6>
                <p class="card-text">{{ $viewData["auction"]->getBasePrice() }}</p>
                
                <!-- Título para las ofertas -->
                <h6>{{ __('Auction.auction_off') }}</h6>
                @if ($viewData['auction']->getOffers()->isEmpty())
                    <p class="card-text">{{ __('Auction.auctions_not_available') }}</p>
                @else
                    <ul class="card-text">
                        @foreach ($viewData['auction']->getOffers() as $offer)
                            <li>{{ $offer->getPrice() }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Botón para crear una nueva oferta -->
                <a href="{{ route('offer.create', ['auctionId' => $viewData["auction"]->getId()]) }}" class="btn text-white" style="background-color: #71A06C;">
                    {{ __('Auction.auction_offer') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
