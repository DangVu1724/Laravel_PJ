@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Edit Product</h1>

    <!-- Form chỉnh sửa sản phẩm -->
    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <small class="form-text text-muted">Current image: {{ $product->image }}</small>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
<style>
    /* CSS Tùy Chỉnh */
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        color: #343a40;
        font-size: 2.5rem;
        margin-bottom: 30px;
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 8px;
    }

    .form-control {
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 10px;
        margin-bottom: 20px;
    }

    .form-group input[type="file"] {
        padding: 5px;
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        font-size: 1.1rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transition: background-color 0.3s ease;
    }

    .form-control,
    .btn {
        margin-top: 5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
    }
</style>
@endsection
