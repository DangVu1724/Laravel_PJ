<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        return view('dashboard');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function index(Request $request)
{
    $query = Product::query();

    // Phân loại theo giá
    if (!$request->has('sort') || $request->sort === 'default') {
        $query->orderBy('created_at', 'desc');
    } else {
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
        }
    }

    $products = $query->get();
    return view('dashboard', compact('products'));
}

public function men(Request $request)
{
    $category = Category::where('name', 'Men')->first();

    if (!$category) {
        return view('category.men', ['products' => []]);
    }

    $query = $category->products();

    if (!$request->has('sort') || $request->sort === 'default') {
        $query->orderBy('created_at', 'desc');
    } else {
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
        }
    }

    $products = $query->distinct()->get();

    return view('category.men', compact('products'));
}

public function women(Request $request)
{
    $category = Category::where('name', 'Women')->first();

    if (!$category) {
        return view('category.women', ['products' => []]);
    }

    $query = $category->products();

    if (!$request->has('sort') || $request->sort === 'default') {
        $query->orderBy('created_at', 'desc');
    } else {
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
        }
    }

    $products = $query->distinct()->get();

    return view('category.women', compact('products'));
}

public function accessory(Request $request)
{
    $category = Category::where('name', 'Accessories')->first();

    if (!$category) {
        return view('category.accessories', ['products' => []]);
    }

    $query = $category->products();

    if (!$request->has('sort') || $request->sort === 'default') {
        $query->orderBy('created_at', 'desc');
    } else {
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
        }
    }

    $products = $query->distinct()->get();

    return view('category.accessories', compact('products'));
}


    public function details($id)
{
    $product = Product::with('category')->find($id);

    if (!$product) {
        abort(404, 'Product not found');
    }

    // Giải mã JSON để lấy danh sách size
    $sizes = $product->size ? json_decode($product->size, true) : [];

    return view('category.productDetails', compact('product', 'sizes'));
}


    
}
