@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container mt-4">
    <!-- Mostrar información de la orden -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Order Information</h5>
            <p class="card-text">Total: {{ $viewData['order']->getTotal() }}</p>
        </div>
    </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
