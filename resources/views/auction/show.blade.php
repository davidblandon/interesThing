@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
 <div class="row g-0">
 <div class="col-md-4">
 <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
 </div>
 <div class="col-md-8">
 <div class="card-body">
 <h5 class="card-title">
 {{ $viewData["auction"]->getProduct()->getName() }}
 </h5>
 <p class="card-text">{{ $viewData["auction"]->getLimitDate() }}</p>
 <p class="card-text">{{ $viewData["auction"]->getBasePrice() }}</p>
 </div>
 </div>
 </div>
</div>
@endsection

 <!--<p class="card-text">{{ $viewData["auction"]->getOff }}</p>*/-->