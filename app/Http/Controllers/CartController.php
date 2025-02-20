<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;



class CartController extends Controller
{
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $userId = Auth::id(); // Nếu user chưa đăng nhập, có thể set null
        $size = $request->input('size', 'S');

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $id)
            ->where('size', $size)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $id,
                'image' => $product->image,
                'name' => $product->name,
                'size' => $size,
                'quantity' => 1,
                'price' => $product->price
            ]);
        }

        return back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    // Hiển thị giỏ hàng
    public function viewCart()
    {
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->with('product')->get();
        $total = $cart->sum(fn($item) => $item->quantity * $item->price);

        return view('cart', compact('cart', 'total'));
    }

    // Cập nhật số lượng sản phẩm
    public function update(Request $request, $id)
    {
        // Kiểm tra xem sản phẩm có trong giỏ hàng không
        $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        // Cập nhật số lượng sản phẩm
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        // Tính lại tổng giá trị giỏ hàng
        $total = Cart::where('user_id', Auth::id())->sum(DB::raw('quantity * price'));

        return response()->json(['success' => true, 'total' => number_format($total, 2)]);
    }







    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCart()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('cart.view')->with('success', 'Giỏ hàng đã được làm trống!');
    }
}
