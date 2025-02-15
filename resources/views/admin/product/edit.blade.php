@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Edit Product</h1>

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

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

<style>
/* CSS Tùy chỉnh để làm giao diện đẹp hơn */
.container {
    max-width: 700px;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #343a40;
    font-size: 2.5rem;
    margin-bottom: 30px;
    font-weight: 700;
    text-transform: uppercase;
}

.form-group label {
    font-weight: bold;
    color: #555;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
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
    padding: 5px 10px;
    background-color: #f8f9fa;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.checkbox-item label {
    margin-left: 8px;
    font-size: 0.95rem;
    color: #333;
}

.category-checkbox {
    width: 18px;
    height: 18px;
    margin-right: 10px;
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    font-size: 1.1rem;
    font-weight: bold;
    text-transform: uppercase;
    width: 100%;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.form-text {
    font-size: 0.85rem;
    color: #888;
}

@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 2rem;
    }

    .btn-primary {
        font-size: 1rem;
    }
}
</style>
@endsection
