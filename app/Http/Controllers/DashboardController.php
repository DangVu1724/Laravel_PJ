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

    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function men()
    {
        // Tìm danh mục "Men"
        $category = Category::where('name', 'Men')->first();

        // Nếu không tìm thấy danh mục, trả về thông báo hoặc view rỗng
        if (!$category) {
            return view('category.men', ['products' => []]);
        }

        // Lấy tất cả sản phẩm thuộc danh mục "Men"
        $products = $category->products()->distinct()->get();

        return view('category.men', compact('products'));
    }
    public function women()
    {
        $category =Category::where('name','Women') ->first();

        if(!$category){
            return view('category.women',['products'=>[]]);
        }

        $products = $category->products()->distinct()->get();
        return view('category.women', compact('products'));
    }
    public function accessory()
    {
        $category =Category::where('name','Accessories') ->first();

        if(!$category){
            return view('category.accessories',['products'=>[]]);
        }

        $products = $category->products()->distinct()->get();
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
