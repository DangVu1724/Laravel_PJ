@extends('layouts.admin_app')

@section('content')
<div class="container">
<h1 class="my-4 text-center">Update Product</h1>

    <!-- Form chỉnh sửa sản phẩm -->
    <form action="{{ config('app.url') }}/admin/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
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
            <label for="size">Chọn size:</label>
            <select name="size[]" id="size" class="form-control" multiple>
                <option value="S" {{ in_array('S', $product->size ?? []) ? 'selected' : '' }}>S</option>
                <option value="M" {{ in_array('M', $product->size ?? []) ? 'selected' : '' }}>M</option>
                <option value="L" {{ in_array('L', $product->size ?? []) ? 'selected' : '' }}>L</option>
                <option value="XL" {{ in_array('XL', $product->size ?? []) ? 'selected' : '' }}>XL</option>
            </select>
            </div>


        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <small class="form-text text-muted">Current image: <strong>{{ $product->image }}</strong></small>
        </div>

        <div class="form-group">
            <label for="category">Categories</label>
            <div class="checkbox-container">
                @foreach ($categories as $category)
                <div class="checkbox-item">
                    <input type="checkbox" name="category_id[]" value="{{ $category->id }}" class="category-checkbox"
                        {{ $product->category->contains($category->id) ? 'checked' : '' }}>
                    <label>{{ $category->name }}</label>
                </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-submit">Update Product</button>
    </form>
</div>

<style>
        body {
            background-color: #1c1c1c;
            color: #f0c020;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #2a2a2a;
            border: 2px solid #f0c020;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(240, 192, 32, 0.5);
            padding: 30px;
        }

        h1 {
            color: #f0c020;
            text-shadow: 2px 2px 4px #000;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            border: 2px solid #f0c020;
            border-radius: 10px;
            padding: 12px;
            background-color: #333;
            color: #fff;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .checkbox-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            background-color: #333;
            border: 1px solid #f0c020;
            padding: 5px 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .checkbox-item:hover {
            transform: scale(1.05);
        }

        .category-checkbox {
            margin-right: 10px;
            accent-color: #f0c020;
        }

        #selectedCategories {
            margin-top: 15px;
            font-style: italic;
            color: #f0c020;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(45deg, #f0c020, #e6b800);
            color: #1c1c1c;
            font-weight: bold;
            font-size: 1.2em;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-5px);
            background: linear-gradient(45deg, #e6b800, #f0c020);
        }

        .btn-submit:active {
            transform: translateY(2px);
        }
    </style>
@endsection
