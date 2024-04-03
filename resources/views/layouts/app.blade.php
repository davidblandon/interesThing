<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src='https://i.ibb.co/gd84j1R/Logo.png' alt="Bootstrap" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @guest
            <li class="nav-item">
            <a class="nav-link active" href="{{ route('login') }}">{{ __('nav.login') }}</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="{{ route('register') }}">{{ __('nav.register') }}</a>
            </li>
            @else
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">{{ __('nav.home') }}</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('product.list') }}">{{ __('nav.products') }}</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('auction.list') }}">{{ __('nav.auctions') }}</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('product.create') }}">{{ __('nav.sell') }}</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('auction.create') }}">{{ __('nav.auct') }}</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('cart.index') }}">{{ __('nav.cart') }}</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('user.profile') }}">{{ __('nav.profile') }}</a>
            </li>
        </ul>
        <form id="logout" action="{{ route('logout') }}" method="POST">
        <a role="button" class="nav-link active"
        onclick="document.getElementById('logout').submit();">Logout</a>
        @csrf
        </form>
        @endguest
        </div>
    </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
