@extends('layouts.home_app')

@section('content')
<div class="search-container mb-4">
        <input type="text" name="query" id="searchInput" class="form-control rounded-pill" placeholder="Tìm kiếm sản phẩm..." value="{{ request('query') }}">
    <!-- Kết quả tìm kiếm hiển thị ở đây -->
    <div id="searchResults" class="search-results position-absolute w-100 bg-black border rounded shadow-sm d-none mt-2">
    <!-- Kết quả tìm kiếm sẽ được thêm vào đây -->
</div></div>


<div class="outer-container d-flex align-items-center justify-content-center">
    <div class="container text-center">

        <div class="row d-flex justify-content-center">
            @foreach ($products as $product)
            <div class="col-12 col-md-4 mb-4 d-flex justify-content-center">
            <a href="{{ config('app.url') }}/category/productDetails/{{ $product->id }}" class="text-decoration-none">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden text-center" style="width: 90%; max-width: 350px; min-height:100px">
                    <img src="/{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                            <h5 class="card-title text-dark">{{ $product->name }}</h5>
                            <p class="card-text text-muted">
                                <strong>Price:</strong> ${{ number_format($product->price, 2) }} <br>
                                <strong>Description:</strong> {{ $product->description }} <br>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
   .search-container {
    margin-top:20px;
    position: relative;
    margin-bottom: 2rem;
    max-width: 600px; /* Giới hạn chiều rộng của phần tìm kiếm */
    margin-left: auto;
    margin-right: auto; /* Căn giữa phần tìm kiếm */
}

.search-container .form-control {
    border-radius: 25px;
    padding: 10px 20px;
    font-size: 1rem;
    border: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 100%; /* Đảm bảo ô input chiếm toàn bộ chiều rộng */
}

.search-results {
    top: 100%;
    left: 0;
    max-height: 300px;
    overflow-y: auto;
    z-index: 1000;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-top: 5px;
    scrollbar-width: none; /* Ẩn thanh cuộn trên Firefox */
    -ms-overflow-style: none; /* Ẩn thanh cuộn trên IE/Edge */
}

.search-results::-webkit-scrollbar {
    display: none; /* Ẩn thanh cuộn trên Chrome/Safari */
}

.search-results .result-item {
    padding: 10px;
    border-bottom: 1px solid #333;
    cursor: pointer;
    transition: background-color 0.2s;
    display: flex;
    align-items: center;
    width: 100%;
    box-sizing: border-box; /* Đảm bảo không có thay đổi kích thước */
}

.search-results .result-item:hover {
    background-color: #333;
    color: #fff;
}

.search-results .img-thumbnail {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 15px;
    flex-shrink: 0;
}

.search-results .product-name {
    font-size: 1rem;
    font-weight: 500;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.search-results .text-muted {
    padding: 10px;
    text-align: center;
    color: #666;
}

.search-results .text-danger {
    padding: 10px;
    text-align: center;
    color: #dc3545;
}


    .outer-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
        padding: 20px;
    }

    .container {
        max-width: 1200px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
        gap: 20px;
    }

    .card {
        transition: transform 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 350px;
        height: 450px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .card-img-top {
        height: 320px;
        object-fit: cover;
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 1rem;
        text-align: center;
        flex-grow: 1; 
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .card-text strong {
        font-weight: bold;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    @media (min-width: 768px) {
        .col-md-4 {
            flex: 0 0 32%;
            max-width: 32%;
        }
    }

    @media (max-width: 767px) {
        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    a.text-decoration-none {
        text-decoration: none;
        color: inherit;
    }

    a.text-decoration-none:hover {
        text-decoration: none;
    }

    .search-results .result-item {
    padding: 10px;
    border-bottom: 1px solid #eee;
    cursor: pointer;
    transition: background-color 0.2s, transform 0.2s;
}

.search-results .result-item:hover {
    background-color: #f0f0f0;
    transform: translateX(5px);
}
.search-container .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
    outline: none;
}
</style>

<script>

document.getElementById('searchInput').addEventListener('input', function () {
    const query = this.value;
    const resultsDiv = document.getElementById('searchResults');

    if (query.length < 2) {
        resultsDiv.style.display = 'none';
        return;
    }

    fetch(`{{ config('app.url') }}/product/search?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                resultsDiv.innerHTML = data.map(product => `
                    <a href="{{ config('app.url') }}/category/productDetails/${product.id}" class="result-item list-group-item list-group-item-action d-flex align-items-center" style="text-decoration: none; color: inherit;">
                        <img src="/${product.image}" alt="${product.name}" class="img-thumbnail me-3">
                        <span class="product-name">${product.name}</span>
                    </a>
                `).join('');
                resultsDiv.style.display = 'block';
            } else {
                resultsDiv.innerHTML = '<div class="p-2 text-muted">Không tìm thấy sản phẩm nào</div>';
                resultsDiv.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Lỗi tìm kiếm:', error);
            resultsDiv.innerHTML = '<div class="p-2 text-danger">Lỗi tìm kiếm. Vui lòng thử lại.</div>';
            resultsDiv.style.display = 'block';
        });
});

// Ẩn kết quả khi click ra ngoài
document.addEventListener('click', function (event) {
    const searchBox = document.getElementById('searchInput');
    const resultsDiv = document.getElementById('searchResults');
    if (!searchBox.contains(event.target) && !resultsDiv.contains(event.target)) {
        resultsDiv.style.display = 'none';
    }
});
</script>

@endsection
