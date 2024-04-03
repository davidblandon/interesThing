@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('createAuction.create') }}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif
            

            <form method="POST" action="{{ route('auction.save') }}" enctype="multipart/form-data">
              @csrf
              <input type="date" class="form-control mb-2" placeholder="{{ __('createAuction.date') }}" name="limitDate" value="{{ old('limitDate') }}" />
              <select class="form-control mb-2" name="product">
                <option value="">{{ __('createAuction.product') }}</option>
                @foreach($viewData['products'] as $product)
                    <option value="{{ $product->getId() }}">{{ $product->getName() }}</option>
                @endforeach
              </select>
              <input type="submit" class="btn btn-primary" placeholder="{{ __('createAuction.send') }}" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
