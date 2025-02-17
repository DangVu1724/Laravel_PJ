# 🛒 Clothing Store

## 🌐 Giới thiệu
Đây là một website bán quần áo trực tuyến được xây dựng bằng framework PHP Laravel, sử dụng cơ sở dữ liệu trên nền tảng Aiven Cloud. Website cho phép người dùng duyệt sản phẩm, tìm kiếm, phân loại và đặt hàng. Quản trị viên có thể quản lý người dùng, sản phẩm và các danh mục liên quan.

## ⚙️ Công nghệ sử dụng
- **Backend:** PHP Laravel
- **Database:** Aiven Cloud Database (MySQL)
- **Frontend:** HTML, CSS, JavaScript (Bootstrap)
- **Authentication:** Laravel Breeze
- **Deployment:** Github CodeSpace
- 
## 🚀 Chức năng chính
### 🛍️ Người dùng
- Xem danh sách sản phẩm
- Tìm kiếm sản phẩm theo tên
- Lọc sản phẩm theo danh mục, giá
- Đăng ký, đăng nhập, đặt hàng

### 🔑 Quản trị viên
- Quản lý sản phẩm: Thêm, sửa, xóa
- Quản lý người dùng: Thêm, sửa, xóa

## 📦 Cài đặt

### 1️⃣ Clone repository
```bash
git clone git@github.com:DangVu1724/Laravel_PJ.git
cd clothing-store
```

### 2️⃣ Cấu hình môi trường
Tạo file `.env` và cấu hình các thông số sau:
```plaintext
DB_CONNECTION=mysql
DB_HOST=<AIVEN_DATABASE_HOST>
DB_PORT=<AIVEN_DATABASE_PORT>
DB_DATABASE=<AIVEN_DATABASE_NAME>
DB_USERNAME=<AIVEN_DATABASE_USER>
DB_PASSWORD=<AIVEN_DATABASE_PASSWORD>
```

### 3️⃣ Cài đặt các package
```bash
composer install
npm install
```

### 4️⃣ Tạo key và migrate database
```bash
php artisan key:generate
php artisan migrate --seed
```

### 5️⃣ Chạy ứng dụng
```bash
php artisan serve
```
Truy cập tại: https://curly-computing-machine-976grqqvpqx73gvw-8000.app.github.dev

## 🔍 Hướng dẫn sử dụng
- **Trang chủ:** Hiển thị danh sách sản phẩm
- **Tìm kiếm:** Nhập từ khóa vào thanh tìm kiếm
- **Phân loại:** Chọn danh mục trong menu
- **Trang quản trị:** `/admin`

## 🔑 Tài khoản demo
- **Admin:** `admin@admin.com` / `123`
- **User:** `user@user.com` / `123`

## 📖 Cấu trúc thư mục
```plaintext
├── app
│   ├── Http\Controllers
│   ├── Models
│   └── Services
├── database
│   └── migrations
├── resources
│   ├── views
│   └── js
├── routes
│   └── web.php
└── public
```

## ⚠️ Lưu ý
- Đảm bảo mở kết nối đến cơ sở dữ liệu trên Aiven.
- Bảo mật các biến môi trường khi deploy lên server.



