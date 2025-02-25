<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class AdminOrderController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        $orders = Order::where('user_id', $id)->get();
        return view('admin.user.orders', compact('user', 'orders'));
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $id) {
        $order = Order::find($id);
        
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }
    
        $order->status = $request->input('status');
        $order->save();
    
        return redirect()->back()->with('success', 'Order status updated successfully');
    }
    
}

