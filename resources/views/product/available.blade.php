@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
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
@endsection
