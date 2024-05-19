@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $viewData['title'] }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <div class="user-info">
                <h2>User Information</h2>
                <p><strong>Name:</strong> {{ $viewData['user']->getName() }}</p>
                <p><strong>Email:</strong> {{ $viewData['user']->getEmail() }}</p>
                <p><strong>Phone:</strong> {{ $viewData['user']->getPhone() }}</p>
                <p><strong>Balance:</strong> ${{ $viewData['user']->getBalance() }}</p>
            </div>
            <div class="menu">
                <h2>Acces data</h2>
                <ul>
                    <li><a href="{{ route('user.buyed') }}">Products Buyed</a></li>
                    <li><a href="{{ route('user.selled') }}">Products Selled</a></li>
                    <li><a href="{{ route('user.onSale') }}">Products On Sale</a></li>
                    <li><a href="{{ route('user.auctions') }}">Auctions</a></li>
                    <li><a href="{{ route('user.offers') }}">Offers</a></li>
                    <li><a href="{{ route('user.orders') }}">Orders</a></li>
                </ul>
            </div>
        </div>
        <div class="profile-content">
            @yield('profile-content')
        </div>
    </div>
</body>
</html>
@endsection
