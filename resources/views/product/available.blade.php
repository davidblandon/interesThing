<!--Created By: Laura-->@
extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div style="position: absolute; top: 2; right: 7px;">
  <form action="{{ route('product.available') }}" method="GET">
    <div class="input-group">
      <div class="form-outline" data-mdb-input-init>
        <input type="search" name="search" id="form1" class="form-control" placeholder="Search" value="{{ request()->input('search') }}" />
      </div>
      <button type="submit" style="background-color: #71A06C" class="btn btn-primary" data-mdb-ripple-init>
        <i class="fas fa-search"></i>
      </button>
    </div>
  </form>
</div>
<div class="container">
<div class="row">
        @foreach($viewData['products'] as $product)
            <div class="col">
                <div class="product">
                    <img src="{{ asset('storage/app/public/' . $product->getPhoto()) }}" class="card-img-top" alt="...">
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
