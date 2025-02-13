<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class TestController extends Controller
{
    // Dữ liệu giả lập
    private $users = [
        1 => 'Nguyen Van A',
        2 => 'Tran Thi B',
        3 => 'Le Thi C',
    ];

    // API GET lấy thông tin người dùng theo ID
    public function show($id)
    {
        // Kiểm tra nếu ID người dùng tồn tại trong mảng
        if (isset($this->users[$id])) {
            $user = (object)[
                'id' => $id,
                'name' => $this->users[$id]
            ];

            // Trả về UserResource
            return new UserResource($user);
        }

        // Nếu không tìm thấy người dùng
        return response()->json(['message' => 'Người dùng không tồn tại'], 404);
    }
}
