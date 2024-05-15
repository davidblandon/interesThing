@extends('layouts.app')

<form  method="POST" action="{{ route('order.create') }}" >
    @csrf

    <!-- Botón para enviar el formulario -->
    <button type="submit">Pay</button>
</form>
