@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15">
      <div class="card" style="background-color: #F9DE96">
        <div class="card-header">{{ __('Auction.create_auction_title') }}</div>
        <div class="card-body">
          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif

          @if($errors->any())
          <ul id="errors" class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('auction.save') }}">
            @csrf
            <!-- Añade los campos necesarios para crear una subasta -->
            <input type="date" class="form-control mb-2" placeholder="{{ __('Enter limit date') }}" name="limitDate" value="{{ old('limitDate') }}" />
            <select class="form-control mb-2" name="productId">
              <option value="">{{ __('Select product') }}</option>
              @foreach($viewData['userProducts'] as $product)
              <option value="{{ $product->getId() }}">{{ $product->getName() }}</option>
              @endforeach
            </select>
            <input type="submit" class="btn btn-primary" value="{{ __('Send') }}" style="background-color: #71A06C" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
