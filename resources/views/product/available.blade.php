@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">
<div class="row">
        @foreach($viewData['products'] as $product)
            <div class="col">
                <div class="product">
                    <img src="{{ url('/images/ropaTopicos.jpeg') }}" alt="{{ $product->name }}">
                    <h2>{{ $product->name }}</h2>
                    <!-- Suponiendo que 'description' sea un atributo en tu modelo -->
                    <p>{{ $product->description }}</p>
                    <button>Ver más</button>
                    <a href="{{ route('cart.add', ['id'=> $product->getId()]) }}">Add to cart</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
@endsection
