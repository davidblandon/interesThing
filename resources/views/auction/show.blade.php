@extends('layouts.app')
@section('title', 'Home Page - eshop')
@section('content')
<div class="d-flex flex-wrap justify-content-center">
<div class="card mb-3" style="width: 12rem;">
    <img src="{{ asset('storage/' . $viewData['product']->getPhoto()) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $viewData['product']->getName() }}</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Last offer: {{ $viewData['auction']->maxOffer() }}</li>
        <li class="list-group-item">Description: {{ $viewData['product']->getDescription() }}</li>
        <li class="list-group-item">Aucter: {{ $viewData['seller'] }}</li>
    </ul>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form id="offerForm" action="{{ route('offer.save') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="offerAmount" class="form-label">Offer Amount:</label>
                        <input type="number" class="form-control" id="offerAmount" name="price" required>
                        <input type="hidden" name="auction" value="{{ $viewData['auction']->getId() }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Send Offer</button>
    </form>
</div>
<div class="d-flex flex-wrap justify-content-center">
@endsection
