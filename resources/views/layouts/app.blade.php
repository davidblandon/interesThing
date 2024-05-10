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
    </head>
    <body>
        <header  class="color-header">
            <h1>"Dale otra oportunidad y una segunda vida 💚"</h1>
        </header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="product">
                        <img src="{{ url('/images/ropaTopicos.jpeg') }}" alt="Clothes">
                        <h2>Clothes</h2>
                        <p>Here, you can see second hand clothes shop.</p>
                        <button>Ver más</button>
                    </div>
                </div>
                <div class="col">
                    <div class="product">
                        <img src="{{ url('/images/ropaTopicos.jpeg') }}" alt="Auctions">
                        <h2>Auctions</h2>
                        <p>Here, you can see exclusive products.</p>
                        <button>Ver más</button>
                    </div>
                </div>
                <div class="col">
                    <div class="product">
                        <img src="{{ url('/images/ropaTopicos.jpeg') }}" alt="Electronics">
                        <h2>Electronics</h2>
                        <p>Here you can see vintage electronics.</p>
                        <button>Ver más</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product">
                        <img src="{{ url('/images/ropaTopicos.jpeg') }}" alt="Accesories">
                        <h2>Accesories</h2>
                        <p>Here you can see beautiful accessories.</p>
                        <button>Ver más</button>
                    </div>
                </div>
                <div class="col">
                    <div class="product">
                        <img src="{{ url('/images/ropaTopicos.jpeg') }}" alt="Videogames">
                        <h2>Videogames</h2>
                        <p>Here, you can shop incredible videogames.</p>
                        <button>Ver más</button>
                    </div>
                </div>
                <div class="col">
                    <div class="product">
                        <img src="{{ url('/images/ropaTopicos.jpeg') }}" alt="Music">
                        <h2>Music</h2>
                        <p>Here, you can shop delightful music vinyls.</p>
                        <button>Ver más</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
