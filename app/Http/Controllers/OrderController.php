<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order', compact('order'));
    }

    public function userOrders()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('order-details
    ', compact('orders'));
    }

    public function placeOrder(Request $request)
{
    $userId = Auth::id(); // Lấy ID người dùng đang đăng nhập

    // Lấy giỏ hàng từ database
    $cart = Cart::where('user_id', $userId)->get();

    // Kiểm tra nếu giỏ hàng trống
    if ($cart->isEmpty()) {
        return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống.');
    }

    // Tạo đơn hàng mới
    $order = new Order();
    $order->user_id = $userId;
    $order->status = 'pending';
    $order->total = $this->calculateTotal($cart);
    $order->save();

    // Lưu sản phẩm vào bảng order_items và cập nhật stock trong bảng products
    foreach ($cart as $item) {
        // Thêm sản phẩm vào order_items
        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $item->product_id;
        $orderItem->quantity = $item->quantity;
        $orderItem->price = $item->price;
        $orderItem->save();

        // Cập nhật số lượng stock trong bảng products
        $product = Product::find($item->product_id);
        if ($product) {
            if ($product->stock < $item->quantity) {
                return redirect()->back()->with('error', 'Sản phẩm ' . $product->name . ' không đủ hàng trong kho.');
            }
            $product->stock -= $item->quantity;
            $product->save();
        }
    }

    // Xóa giỏ hàng sau khi đặt hàng thành công
    Cart::where('user_id', $userId)->delete();

    // Chuyển hướng đến trang order
    return redirect()->route('order.show', $order->id)->with('success', 'Đặt hàng thành công!');
}



    private function calculateTotal($cart)
{
    return $cart->sum(fn($item) => floatval($item->price) * $item->quantity);
}


}

