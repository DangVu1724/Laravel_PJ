<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    public function store(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'category_id' => 'required|array',  // Kiểm tra category_id là mảng
        'category_id.*' => 'exists:categories,id', // Kiểm tra từng giá trị trong mảng category_id có tồn tại trong bảng categories
        'image' => 'nullable|image|max:2048', // Kiểm tra ảnh nếu có
    ]);

    // Xử lý ảnh nếu có
    $imagePath = null;
    if ($request->hasFile('image')) {
        // Lưu ảnh vào thư mục public/images và trả về đường dẫn
        $imagePath = $request->file('image')->store('images', 'public');
    }

    // Tạo sản phẩm mới với dữ liệu từ form
    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'image' => $imagePath, // Lưu đường dẫn ảnh nếu có
    ]);

    // Gắn các category vào sản phẩm
    $product->category()->attach($request->category_id);

    // Redirect đến trang danh sách sản phẩm
    return redirect()->route('product.index')->with('success', 'Product created successfully!');
}


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('categories','product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048', // Kiểm tra ảnh nếu có
        ]);

        $data = $request->all();
        
        // Xử lý hình ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($data);

        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
