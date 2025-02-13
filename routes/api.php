<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::put('/edit-info', function (Request $request) {
    // Lấy thông tin từ header
    $email = $request->header('User-Email');
    $password = $request->header('User-Password');
    
    // Kiểm tra mật khẩu (mật khẩu đúng trong ví dụ là '123')
    $correctPassword = '123';
    if ($password !== $correctPassword) {
        return response()->json([
            'message' => 'Mật khẩu sai!'
        ], 401); 
    }

    // Lấy thông tin cần chỉnh sửa từ body (thường là JSON)
    $newName = $request->header('name');
    $newAddress = $request->header('address');

    // Giả sử bạn chỉ chỉnh sửa thông tin trong bộ nhớ (không lưu vào cơ sở dữ liệu)
    // Ví dụ: tạo mảng thông tin người dùng ban đầu
    $userInfo = [
        'email' => $email,
        'name' => 'Old Name', // Giá trị mặc định ban đầu
        'address' => 'Old Address' // Giá trị mặc định ban đầu
    ];

    // Lưu thông tin trước khi sửa
    $oldUserInfo = $userInfo;

    // Cập nhật thông tin trong mảng
    if ($newName) {
        $userInfo['name'] = $newName;
    }

    if ($newAddress) {
        $userInfo['address'] = $newAddress;
    }

    // Trả về thông tin trước và sau khi sửa
    return response()->json([
        'message' => 'Thông tin đã được chỉnh sửa thành công',
        'old_user_info' => $oldUserInfo, // Thông tin trước khi sửa
        'new_user_info' => $userInfo,    // Thông tin sau khi sửa
    ])
    ->header('User-Email', $email)
    ->header('User-Password', $password);
});
