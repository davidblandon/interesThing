<!-- Created By: Laura -->
@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Offer.create_offer_title') }}</div>
          <div class="card-body">

            <!-- Mensajes de éxito -->
            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

            <!-- Mensajes de error -->
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('offer.save', ['auctionId' => $viewData["auctionId"]]) }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="{{ __('Offer.enter_price') }}" name="price" value="{{ old('price') }}" />
              <input type="submit" class="btn btn-primary" value="{{ __('Offer.send') }}" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
