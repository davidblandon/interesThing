<!--Created By: Laura-->
@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container mt-4">
    <!-- Mostrar información de la orden -->
    <div class="card mb-4">
        <div class="card-body" style="background-color: #F9DE96">
            <h5 class="card-title">{{ __('Order.order_info') }}</h5>
            <p class="card-text">Total: {{ $viewData['order']->getTotal() }}</p>
        </div>
    </div>
</div>

<!-- Mostrar lista de productos asociados a la orden -->
<form method="POST" action="{{ route('order.download', ['id' => $viewData['order']->getId()]) }}">
    @csrf <!-- Agrega esto si estás utilizando Laravel 7 o superior para proteger contra ataques CSRF -->
    <button type="submit" name="download" style="background-color: #71A06C; color: #ffffff;" value="PDF">{{ __('Order.order_d_pdf') }}</button>
    <button type="submit" name="download" style="background-color: #71A06C; color: #ffffff;" value="Excel">{{ __('Order.order_excel') }}</button>
</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
