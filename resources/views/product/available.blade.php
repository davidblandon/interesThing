@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

 <div class="input-group rounded">
  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>

<div class="container">
<div class="row">
        @foreach($viewData['products'] as $product)
            <div class="col">
                <div class="product">
                    <img src="{{ url('/images/ropaTopicos.jpeg') }}" alt="{{ $product->name }}">
                    <h2>{{ $product->name }}</h2>
                    <!-- Suponiendo que 'description' sea un atributo en tu modelo -->
                    <p>{{ $product->description }}</p>
                    <a  href="{{ route('product.show', ['id'=> $product->getId()]) }}">  <button style="background-color: #71A06C">Quick look</button>
                    <a  href="{{ route('cart.add', ['id'=> $product->getId()]) }}"> <button style="background-color: #71A06C">Add to cart</button></a>
                </div>
            </div>
        @endforeach  
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
@endsection
