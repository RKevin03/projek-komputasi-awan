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
    <div class="container-sm mt-5">
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center fw-bold display-2" style="color: #644961">
                        <h2>Edit Product</h2>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3 fw-bold" style="color: #644961">
                            <label for="name" class="form-label">Product Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                id="name" value="{{ old('name', $product->name) }}" placeholder="Enter Product Name">
                            @error('name')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 fw-bold" style="color: #644961">
                            <label for="price" class="form-label">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price"
                                id="price" value="{{ old('price', $product->price) }}"
                                placeholder="Enter Product Price">
                            @error('price')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 fw-bold" style="color: #644961">
                            <label for="stock" class="form-label">Stock</label>
                            <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock"
                                id="stock" value="{{ old('stock', $product->stock) }}" placeholder="Enter Stock">
                            @error('stock')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 fw-bold" style="color: #644961">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category"
                                class="form-select @error('category') is-invalid @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="photo" class="form-label fw-bold" style="color: #644961">Product Photo</label>
                            <input type="file" class="form-control" name="photo" id="photo">
                            @if ($product->encrypted_filename)
                                <small class="form-text text-muted">Current Photo:
                                    {{ $product->original_filename }}</small>
                                    
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="delete_photo" id="delete_photo">
                                    <label class="form-check-label" for="delete_photo">Delete current photo</label>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('products.index') }}" class="btn btn-custom1 mt-3 fw-bold">Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-custom mt-3 fw-bold">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
