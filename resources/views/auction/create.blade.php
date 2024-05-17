<!--Created By: Laura-->
@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card" style="background-color: #F9DE96">
        <div class="card-header">Create auction</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('auction.save') }}">
              @csrf
              <input type="date" class="form-control mb-2" placeholder="Enter limit date" name="limitDate" value="{{ old('limitDate') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter base price" name="basePrice" value="{{ old('basePrice') }}" />
              <select class="form-control mb-2" name="productId">
                <option value="">Enter the product you want to auct</option>
                @foreach($viewData['userProducts'] as $product)
                    <option value="{{ $product->getId() }}">{{ $product->getName() }}</option>
                @endforeach
              </select>
              <input type="submit" class="btn btn-primary" style="background-color: #71A06C" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
