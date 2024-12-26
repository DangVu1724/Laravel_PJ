@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Add New Product</h1>

    <!-- Form thêm sản phẩm -->
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="category">Categories</label>
            <div class="checkbox-container">
                @foreach ($categories as $category)
                    <div class="checkbox-item">
                        <input type="checkbox" name="category_id[]" value="{{ $category->id }}" class="category-checkbox">
                        <label>{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="selectedCategories" class="mt-2">
            <!-- Các category đã được chọn sẽ hiển thị ở đây -->
        </div>

        <button type="submit" class="btn btn-primary btn-block">Add Product</button>
    </form>
</div>

<script>
    // Lắng nghe sự kiện khi checkbox được chọn hoặc bỏ chọn
    document.querySelectorAll('.category-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateSelectedCategories();
        });
    });

    // Hàm cập nhật danh sách các category đã chọn
    function updateSelectedCategories() {
        const selectedCategories = [];
        document.querySelectorAll('.category-checkbox:checked').forEach(checkbox => {
            selectedCategories.push(checkbox.nextElementSibling.textContent.trim());
        });

        // Cập nhật danh sách các category đã chọn
        const selectedCategoriesDiv = document.getElementById('selectedCategories');
        if (selectedCategories.length > 0) {
            selectedCategoriesDiv.innerHTML = 'Selected: ' + selectedCategories.join(', ');
        } else {
            selectedCategoriesDiv.innerHTML = 'No categories selected';
        }
    }
</script>

<style>
    /* CSS Tùy Chỉnh */
    .category-checkbox {
        width: 18px; /* Điều chỉnh chiều rộng của checkbox */
        height: 18px; /* Điều chỉnh chiều cao của checkbox */
        margin-right: 10px; /* Khoảng cách giữa checkbox và label */
    }

    .dropdown-menu label {
        font-size: 14px; /* Thay đổi kích thước chữ để dễ nhìn */
    }

    .checkbox-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px; /* Khoảng cách giữa các checkbox */
    }

    .checkbox-item {
        display: flex;
        align-items: center;
    }

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
</style>
@endsection
