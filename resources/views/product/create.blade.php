@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('createProduct.create') }}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif

            <form method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="{{ __('createProduct.name') }}" name="name" value="{{ old('name') }}" />
              <input type="text" class="form-control mb-2" placeholder="{{ __('createProduct.description') }}" name="description" value="{{ old('description') }}" />
              <input type="text" class="form-control mb-2" placeholder="{{ __('createProduct.price') }}" name="price" value="{{ old('price') }}" />
              <input type="file" class="form-control mb-4" placeholder="{{ __('createProduct.photo') }}" name="photo" accept="image/*"/>
              <select class="form-control mb-2" name="category" id="categorySelect">
                <option value="" placeholder=>{{ __('createProduct.category') }}</option>
                @foreach($viewData['categories'] as $category)
                 <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
              </select>
              <input type="submit" class="btn btn-primary" placeholder="{{ __('createProduct.send') }}" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
