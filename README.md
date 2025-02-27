# 🛒 Clothing Store



**Github**: https://github.com/DangVu1724/Laravel_PJ.git
**Readme**: https://dangvu1724.github.io/Laravel_PJ/

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
- Xem lịch sử đơn hàng
- Quản lý giỏ hàng

### 🔑 Quản trị viên
- Quản lý sản phẩm: Thêm, sửa, xóa
- Quản lý người dùng: Thêm, sửa, xóa
- Quản lý đơn hàng: Cập nhật trạng thái, xoá
  
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
## 📷 Sơ đồ Usecase tổng quan

![image](https://github.com/user-attachments/assets/6abf2593-f649-4862-8874-a82c61838096)

## 📷 Hình ảnh
**1. Đăng nhập**
Màn hình đăng nhập cho phép người dùng nhập email và mật khẩu.

![image](https://github.com/user-attachments/assets/8c19264e-7cc9-4cba-9e00-6aa1580247f8)


**2. Đăng ký tài khoản**
Giao diện đăng ký tài khoản, người dùng nhập các thông tin cơ bản như tên, email, mật khẩu.

![image](https://github.com/user-attachments/assets/d0a5fd85-376d-46ba-927f-46f0787dd0d5)


**3. Trang chủ**
Trang chính của ứng dụng, hiển thị các sản phẩm hoặc dịch vụ của website.

![image](https://github.com/user-attachments/assets/5a35c0b4-05fd-41af-984f-9c77b067125c)


**4. Quản lý người dùng**
Giao diện quản lý người dùng cho phép quản trị viên xem và chỉnh sửa thông tin người dùng.

![image](https://github.com/user-attachments/assets/f9ecf8e5-a0b2-41d5-a5f5-5934bdab8866)


**5. Quản lý sản phẩm**
Giao diện quản lý sản phẩm, nơi quản trị viên có thể thêm, sửa, hoặc xóa sản phẩm.

![image](https://github.com/user-attachments/assets/cf1974d9-3823-4ee0-ae48-325283a15da7)


**6. Quản lý đơn hàng**
Giao diện quản lý đơn hàng, cho phép quản trị viên theo dõi và thay đổi trạng thái đơn hàng.

![image](https://github.com/user-attachments/assets/833eb8c0-05c8-4d36-83d0-ff793e34d955)

**7. Chi tiết sản phẩm**

![image](https://github.com/user-attachments/assets/be711ecc-00ac-4559-8af8-31f38d72f604)

**8. Xem lịch sử đơn hàng**

![image](https://github.com/user-attachments/assets/46868eaa-a3b4-45ec-a27a-bfdceca997ae)

**9. Quản lý giỏ hàng**

![image](https://github.com/user-attachments/assets/97ce2631-d4fc-4604-8f9d-ba508483789b)


**10. Chỉnh sửa thông tin người dùng**

![image](https://github.com/user-attachments/assets/af892332-481c-4e3e-a3e3-2e951e7f636d)


**11. Đánh giá sản phẩm**

![image](https://github.com/user-attachments/assets/ab213ea6-620c-4d2c-b18b-9f35ebf1ae19)




