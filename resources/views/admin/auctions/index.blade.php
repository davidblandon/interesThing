<!--Created By: Laura-->

<!-- $this->attributes['limitDate'] - date - contains the limit of the auction
     * $this->attributes['basePrice'] - int - contains the base price of the auction
     * $this->attributes['active'] - bool - checks if the auction is active
     * $this->product - Product - contains the product associeted to the auction -->
@extends('layouts.admin')

@section('title', $viewData["title"])

@section('content')

<div class="card mb-4">
<div class="card-header">
Create Products
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.auction.store') }}">

@csrf
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Date:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="limitDate" value="{{ old('limitDate') }}" type="date" class="form-control">
</div>
</div>
</div>
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Base Price:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="basePrice" value="{{ old('basePrice') }}" type="number" class="form-control">
</div>
</div>
</div>
</div>
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Active:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="active" value="{{ old('active') }}" type="bool" class="form-control">
</div>
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Active:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="active" value="{{ old('active') }}" type="boolr" class="form-control">
</div>
<select class="form-control mb-2" name="productId">
                <option value="">Enter the product you want to auct</option>
     
                    <option value="{{ $product->getId() }}">{{ $product->getName() }}</option>
             
              </select>

              <div class="card">
        <div class="card-header">
            Manage Auctions
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData["auctions"] as $auctions)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getName() }}</td>
                            <td>
                        <a class="btn btn-primary" href="{{route('admin.auctions.edit', ['id'=> $product->getId()])}}">
                            Edit
                            <i class="bi-pencil"></i>
                        </a> 
                    </td>
                            <td>
                        <form action="{{ route('admin.auctions.delete', $product->getId())}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                Delete
                                <i class="bi-trash"></i>
                            </button>
                        </form> 
                    </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

