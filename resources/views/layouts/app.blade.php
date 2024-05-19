<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/be50e46cfb.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Enlace al CSS personalizado -->
    <title>@yield('title', 'Online Store')</title>
</head>
<body>
<!--Header-->
<nav class="navbar navbar-expand-lg bg-body-tertiary login">
    <div class="container-fluid login">
        <!-- Mover la imagen del logo arriba -->
        <img src="{{ url('/images/logoInteresThing.png') }}" alt="" class="navbar-image">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"> <!-- Cambiado ms-auto a me-auto para alinear a la izquierda -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <div class="vr bg-white mx-2 d-none d-lg-block"></div> 
                @guest 
                <a class="nav-link active" href="{{ route('login') }}">Login</a> 
                <a class="nav-link active" href="{{ route('register') }}">Register</a> 
                @else 
                <form id="logout" action="{{ route('logout') }}" method="POST"> 
                    <a role="button" class="nav-link active" 
                    onclick="document.getElementById('logout').submit();">Logout</a> 
                    @csrf 
                </form> 
                <a role="button" class="nav-link active" href="{{ route('user.profile') }}">Profile</a>
                 @endguest
            </ul>
        </div>
        <!-- Agregamos un enlace para abrir el sidebar -->
        <a class="nav-link" href="javascript:void(0)" onclick="openSidebar()">☰</a>
    </div>
</nav>

<!-- Nuevo encabezado -->
<header class="header">
    <h1 class="text-center my-4">Give it a second chance!</h1>
</header>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <!-- Botón para cerrar el sidebar -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">×</a>
    <!-- Enlaces del sidebar -->
    <a href="#">Auctions</a>
    <ul class="submenu">
        <li><a href="{{ route('auction.avaliable') }}">View Auctions</a></li>
        <li><a href="{{ route('auction.create') }}">Create Auction</a></li>
    </ul>
    <a href="{{ route('cart.index') }}">View Cart</a>
    <a href="#">Product</a>
    <ul class="submenu">
        <li><a href="{{ route('product.avaliable') }}">View Products</a></li>
        <li><a href="{{ route('product.create') }}">Add Product</a></li>
    </ul>
</div>

<!-- Contenido principal -->
<div class="container my-12">
    @yield('content')
</div>

<!-- Footer -->
<footer class="footer mt-auto py-3" style="background-color: #71A06C; color: white;">
    <div class="container">
        <div class="row">
            <div class="col">
                <span style="white-space: nowrap;">Work with us now: Pass context team </span>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script>
    function openSidebar() {
        document.getElementById("sidebar").style.width = "250px";
    }

    function closeSidebar() {
        document.getElementById("sidebar").style.width = "0";
    }
</script>
</body>
</html>
