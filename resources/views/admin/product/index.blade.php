@extends('layouts.admin_app')

@section('content')

<head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container">
    <h1 class="my-4 text-center">Manage Products</h1>

    <!-- Thêm sản phẩm -->
    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Add Product</a>

    <!-- Bảng sản phẩm -->
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->image }}</td>
                <td>
                    @foreach ($product->category->unique('id') as $category)
                    {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('product.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('product.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection