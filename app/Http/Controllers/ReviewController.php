<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(), // Lưu ID người dùng đang đăng nhập
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}

