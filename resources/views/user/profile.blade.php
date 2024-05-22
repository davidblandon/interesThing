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
                <h2>{{ __('User.user_info') }}</h2>
                <p><strong>{{ __('User.user_name') }}</strong> {{ $viewData['user']->getName() }}</p>
                 <p><strong>{{ __('User.user_mail') }}</strong> {{ $viewData['user']->getEmail() }}</p>
                <p><strong>{{ __('User.user_phone') }}:</strong> {{ $viewData['user']->getPhone() }}</p>
                <p><strong>{{ __('User.user_balance') }}:</strong> ${{ $viewData['user']->getBalance() }}</p>
            </div>
            <div class="menu">
                <h2>{{ __('User.user_data') }}</h2>
                <ul>
                    <li><a href="{{ route('user.buyed') }}">{{ __('User.user_buyed') }}</a></li>
                    <li><a href="{{ route('user.selled') }}">{{ __('User.user_selled') }}</a></li>
                    <li><a href="{{ route('user.onSale') }}">{{ __('User.user_on_sale') }}</a></li>
                    <li><a href="{{ route('user.auctions') }}">{{ __('User.user_auctions') }}</a></li>
                    <li><a href="{{ route('user.offers') }}">{{ __('User.user_offers') }}</a></li>
                    <li><a href="{{ route('user.orders') }}">{{ __('User.user_orders') }}</a></li>
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
