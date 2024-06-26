<!--Created By: Laura-->

@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit Auction
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif


        <form method="POST" action="{{ route('admin.auction.update', ['id'=> $viewData['auction']->getId()]) }}"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">limitDate:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="limitDate" value="{{ $viewData['auction']->getLimitDate() }}" type="date"
                            class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Base Price:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="basePrice" value="{{ $viewData['auction']->getBasePrice() }}" type="number"
                            class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
    <div class="mb-3 row">
        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Active:</label>
        <div class="col-lg-10 col-md-6 col-sm-12">
            <select name="active" class="form-control">
                <option value="1" >Active</option>
                <option value="0" >Inactive</option>
            </select>
        </div>
    </div>
</div>
           
            <select class="form-control mb-2" name="productId">
                        <option value="">Select the product you want to auction</option>
                        @foreach($viewData['products'] as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
       
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection