@extends('layouts.admin')

@section('title', $viewData["title"])

@section('content')

<div class="card mb-4">
    <div class="card-header">
        Create Auction
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.auction.store') }}" enctype="multipart/form-data">
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
            </div>

            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Product:</label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    <select class="form-control mb-2" name="productId" required>
                        <option value="">Select the product you want to auction</option>
                        @foreach($viewData['products'] as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Create Auction</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Manage Auctions
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Base Price</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["auctions"] as $auction)
                    <tr>
                        <td>{{ $auction->getId() }}</td>
                        <td>{{ $auction->getProduct()->getName() }}</td>
                        <td>{{ $auction->getBasePrice() }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.auction.edit', ['id'=> $auction->getId()]) }}">
                                Edit
                                <i class="bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.auction.delete', ['id' => $auction->getId()]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this auction?')">
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
