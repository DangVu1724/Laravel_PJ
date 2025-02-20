document.getElementById('searchInput').addEventListener('input', function () {
    const query = this.value;
    const resultsDiv = document.getElementById('searchResults');

    if (query.length < 2) {
        resultsDiv.style.display = 'none';
        return;
    }

    fetch(`${baseUrl}/product/search?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                resultsDiv.innerHTML = data.map(product => `
                    <a href="${baseUrl}/category/productDetails/${product.id}" class="result-item list-group-item list-group-item-action d-flex align-items-center" style="text-decoration: none; color: inherit;">
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


