<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<div class="col-md-4 d-flex justify-content-end">
    <div class="dropdown">
        <button class="btn btn-outline-dark rounded-pill dropdown-toggle d-flex align-items-center px-4 py-2"
            type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-filter me-2"></i> 
        </button>
        <ul class="dropdown-menu shadow border-0 rounded-3" aria-labelledby="filterDropdown">
            <li><a class="dropdown-item" href="?sort=default"><i class="fas fa-list-ul me-2"></i> Mặc định</a></li>
            <li><a class="dropdown-item" href="?sort=price_asc"><i class="fas fa-sort-up me-2"></i> Giá: Thấp đến cao</a></li>
            <li><a class="dropdown-item" href="?sort=price_desc"><i class="fas fa-sort-down me-2"></i> Giá: Cao đến thấp</a></li>
            <li><a class="dropdown-item" href="?sort=name_asc"><i class="fas fa-sort-alpha-up me-2"></i> Tên: A-Z</a></li>
            <li><a class="dropdown-item" href="?sort=name_desc"><i class="fas fa-sort-alpha-down me-2"></i> Tên: Z-A</a></li>
        </ul>
    </div>
</div>
