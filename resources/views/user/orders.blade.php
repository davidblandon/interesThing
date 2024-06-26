@extends('layouts.app')

@section('title', $viewData['title'])
@section('content')
<div class="container">
    <h1>{{ $viewData['title'] }}</h1>
    @if(count($viewData['orders']) > 0)
        <ul>
            @foreach ($viewData['orders'] as $order)
                <li>Order ID: {{ $order->id }} - Total: {{ $order->total }}</li>
            @endforeach
        </ul>
    @else
        <p>{{ __('User.user_not_aviable') }}</p>
    @endif
</div>
@endsection
