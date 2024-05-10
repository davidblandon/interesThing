<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/be50e46cfb.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Registro</title>
</head>
<body>
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
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Register</a>
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Catálogo de Productos</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            .color-header h1 {
                font-size: 1.5rem; /* Tamaño de fuente ajustado */
            }
        </style>
    </head>
    <body>
        <header  class="color-header">
            <h1>"Dale otra oportunidad y una segunda vida 💚"</h1>
        </header>
        <div class="container">
            <div class="product">
                <img src="product1.jpg" alt="Producto 1">
                <h2>Producto 1</h2>
                <p>Descripción del producto 1.</p>
                <span>$50.00</span>
                <button>Agregar al carrito</button>
            </div>
            <div class="product">
                <img src="product2.jpg" alt="Producto 2">
                <h2>Producto 2</h2>
                <p>Descripción del producto 2.</p>
                <span>$40.00</span>
                <button>Agregar al carrito</button>
            </div>
            <div class="product">
                <img src="product3.jpg" alt="Producto 3">
                <h2>Producto 3</h2>
                <p>Descripción del producto 3.</p>
                <span>$60.00</span>
                <button>Agregar al carrito</button>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
