@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15" >
      <div class="card" style=" background-color: #F9DE96  ">
        <div class="card-header">Create product</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ old('description') }}" />
              <input type="file" class="form-control mb-4" placeholder="Enter photo" name="photo" accept="image/*"/>
              <select class="form-control mb-2" name="category" id="categorySelect">
                <option value="" placeholder=>Select category</option>
                @foreach($viewData['categories'] as $category)
                 <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
              </select>
              <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />
              <input type="submit" class="btn btn-primary" value="Send" style=" background-color: #71A06C " />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
