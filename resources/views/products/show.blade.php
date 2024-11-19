@extends('layouts.app')
@section('content')
<style>
    body {
        background-color: #F4CDB0;
    }
    .btn-custom {
        background-color: #644961;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    .btn-custom1 {
        background-color: #F4CDB0;
        border: none;
        color: #644961;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-5 border">
                <div class="mb-3 text-center fw-bold display-2" style="color: #644961">
                    <h2>Product Details</h2>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-bold" style="color: #644961">Product Name</label>
                        <br>
                        <h9>{{ $product->name }}</h9>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-bold" style="color: #644961">Price</label>
                        <br>
                        <h9>{{ $product->price }}</h9>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="stock" class="form-label fw-bold" style="color: #644961">Stock</label>
                        <br>
                        <h9>{{ $product->stock }}</h9>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label fw-bold" style="color: #644961">Category</label>
                        <br>
                        <h9>{{ $product->category->name }}</h9>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="photo" class="form-label fw-bold" style="color: #644961">Product Photo</label>
                        @if ($product->original_filename)
                        <br>
                            <h9>{{ $product->original_filename }}</h9>
                            <br>
                            <a href="{{ route('products.downloadFile', ['productId' => $product->id]) }}"
                                class="btn btn-custom1 mt-4 fw-bold" style="color: #644961">
                                <i class="bi bi-download me-1"></i> Download Photo
                            </a>
                        @else
                            <h5>None</h5>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('home') }}" class="btn btn-custom mt-3 fw-bold">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
