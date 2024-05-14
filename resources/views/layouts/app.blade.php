<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/be50e46cfb.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title', 'Online Store')</title>
</head>
<body>   
  <!--Header-->
<nav class="navbar navbar-expand-lg bg-body-tertiary login">
  <div class="container-fluid login">
    <!-- Mover la imagen del logo arriba -->
    <img src="{{ url('/images/logoInteresThing.png') }}" alt="" class="navbar-image">
    <form class="d-flex">
        <input type="search" class="form-control" placeholder="Search" aria-label="Buscar" >
        <button class="btn btn-outline-success"  type="submit">Search</button>
    </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart.index') }}">Carrito de compras</a>
            </li>
        </ul>
    </div>
  </div>
</nav>
<div>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.5">
        <title>Catálogo de Productos</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header  class="color-header">
            <h1>Give it a second chance 💚</h1>
        </header> 
        <!--header-->
        <!--content-->
        <div class="container my-12">
        @yield('content')
    </div>
    <!--endContent-->
    <!--footer-->
</html>
<footer class="footer mt-auto py-3" class="footer" style="background-color: #71A06C; color: white;">
  <div class="container">
    <div class="row">
        <div class="col">
            <span style="white-space: nowrap;">Trabaja con nosotros</span>
        </div>
        <div class="col text-end">
            <a href="#"><i class="fab fa-facebook-f fa-lg me-3" style="color: white;"></i></a>
            <a href="#"><i class="fab fa-twitter fa-lg me-3" style="color: white;"></i></a>
            <a href="#"><i class="fab fa-instagram fa-lg me-3" style="color: white;"></i></a>
            <a href="#"><i class="fab fa-linkedin-in fa-lg me-3" style="color: white;"></i></a>
        </div>
    </div>
  </div>
</footer>
</html>
<!--endFooter-->
