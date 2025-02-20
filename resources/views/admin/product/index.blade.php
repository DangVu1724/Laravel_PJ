@extends('layouts.admin_app')

@section('content')

<head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
            position: relative;
        }

        h1 {
            color: #007bff;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
        }

        #productTable img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    display: flex;
    margin: auto;
    border-radius: 10px;
}

        .btn-warning {
            background-color: #ffc107;
            border: none;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .btn-warning:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(255, 193, 7, 0.4);
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.4);
        }

        /* Drawer Styles */
        .drawer {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            z-index: 1000;
            padding: 20px;
        }

        .drawer.open {
            right: 0;
        }

        .drawer h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #007bff;
        }

        .drawer ul {
            list-style: none;
            padding: 0;
        }

        .drawer ul li {
            margin-bottom: 10px;
        }

        .drawer ul li a {
            color: #333;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .drawer ul li a:hover {
            color: #007bff;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        .overlay.active {
            display: block;
        }
    </style>
</head>

<div class="container">
    <h1 class="my-4">Manage Products</h1>

    <!-- Button to toggle the drawer -->
    <button id="toggleDrawer" class="btn btn-primary mb-3"><i class="fas fa-bars"></i> Categories</button>

    <!-- Thêm sản phẩm -->
    <a href="{{ config('app.url') }}/admin/product/create" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Product</a>

    <!-- Bảng sản phẩm -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Size</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="productTable">
    @foreach ($products as $product)
    <tr data-category="{{ $product->category->pluck('id')->join(',') }}">
        <td>{{ $product->name }}</td>
        <td>${{ number_format($product->price, 2) }}</td>
        <td>{{ $product->stock }}</td>
        <td>{{ implode(', ', json_decode($product->size, true) ?? []) }}</td>
        <td><img src="/{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 60px; height: 60px;"></td>
        <td>
        @if ($product->category)
                @foreach ($product->category as $category)
                    {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            @else
                No categories
            @endif
</td>

        <td>
            <a href="{{ config('app.url') }}/admin/product/{{ $product->id }}/edit" class="btn btn-warning btn-sm me-2"><i class="fas fa-edit"></i> Edit</a>
            <form action="{{ config('app.url') }}/admin/product/{{ $product->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this product?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $products->appends(request()->query())->links() }}
</div>


<!-- Drawer -->
<div class="drawer" id="drawer">
    <h2>Categories</h2>
    <ul>
    <li><a href="/admin/product" onclick="event.preventDefault(); window.location.href='/admin/product';">Tất cả</a></li>


        @foreach ($categories as $category)
        <li><a href="#" data-category-id="{{ $category->id }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>

<!-- Overlay -->
<div class="overlay" id="overlay"></div>

<!-- JavaScript -->
<script>
    // Toggle Drawer
    document.getElementById('toggleDrawer').addEventListener('click', function() {
        document.getElementById('drawer').classList.toggle('open');
        document.getElementById('overlay').classList.toggle('active');
    });

    // Close Drawer when clicking outside
    document.getElementById('overlay').addEventListener('click', function() {
        document.getElementById('drawer').classList.remove('open');
        document.getElementById('overlay').classList.remove('active');
    });

    // Filter products by category and move matched rows to the top
    document.querySelectorAll('#drawer ul li a').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const categoryId = this.getAttribute('data-category-id');
        const url = new URL(window.location.href);
        url.searchParams.set('category_id', categoryId);
        window.location.href = url.href;
    });
});



    // Show all products when clicking the "Categories" button again
    document.getElementById('toggleDrawer').addEventListener('click', function() {
        const rows = document.querySelectorAll('#productTable tr');
        rows.forEach(function(row) {
            row.style.display = '';
        });
    });
</script>

@endsection