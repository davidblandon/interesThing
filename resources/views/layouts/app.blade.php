<!-- Created By: Laura -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/be50e46cfb.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        .navbar-nav .nav-link {
            padding: 0.5rem 1rem;
        }

        .btn-search {
            color: white; /* Cambiar el color del texto del botón */
            border-color: white; /* Cambiar el color del borde del botón */
        }

        /* Estilos del sidebar */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0; /* Posicionar a la derecha */
            background-color: #a06e3f;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 20px;
            color: #ffffff;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            left: 25px;
            font-size: 36px;
            margin-right: 50px; /* Ajustar margen derecho */
        }

        .sidebar .submenu {
            padding-left: 20px; /* Ajustar el espacio de la sublista */
        }

        @media screen and (max-height: 450px) {
            .sidebar {padding-top: 15px;}
            .sidebar a {font-size: 18px;}
        }
    </style>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- Agregamos un enlace para abrir el sidebar -->
        <a class="nav-link" href="javascript:void(0)" onclick="openSidebar()">☰</a>
    </div>
</nav>
<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <!-- Botón para cerrar el sidebar -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">×</a>
    <!-- Enlaces del sidebar -->
    <a href="#">Auctions</a>
    <ul class="submenu">
        <li><a href="{{ route('auction.available') }}">View Auctions</a></li>
        <li><a href="{{ route( 'auction.create' ) }}">Create Auction</a></li>
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
                <span style="white-space: nowrap;">Work with us now</span>
            </div>
            <div class="col text-end">
                <a href="#"><i class="fab fa-facebook-f fa-lg me-2" style="color: white;"></i></a>
                <a href="#"><i class="fab fa-twitter fa-lg me-2" style="color: white;"></i></a>
                <a href="#"><i class="fab fa-instagram fa-lg me-2" style="color: white;"></i></a>
                <a href="#"><i class="fab fa-linkedin-in fa-lg me-2" style="color: white;"></i></a>
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
