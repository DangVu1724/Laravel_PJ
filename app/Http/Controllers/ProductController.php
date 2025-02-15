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
        'category_id' => 'required|array',  
        'category_id.*' => 'exists:categories,id',
        'image' => 'nullable|image|max:2048', 
    ]);

    // Xử lý ảnh nếu có
    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
    } else {
        $imagePath = null;
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
            'category_id' => 'required|array', // Đảm bảo category_id là mảng
            'category_id.*' => 'exists:categories,id', // Mỗi phần tử phải tồn tại trong bảng categories
            'image' => 'nullable|image|max:2048', // Kiểm tra ảnh nếu có
        ]);

        // Cập nhật thông tin sản phẩm
        $data = $request->except('category_id'); // Loại trừ category_id ra khỏi $data

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($data);

        // Cập nhật các category liên kết với sản phẩm
        $product->category()->sync($request->input('category_id'));

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    // Chỉ tìm các sản phẩm bắt đầu bằng từ khóa
    $products = Product::where('name', 'like', "{$query}%")
                       ->orderBy('name')
                       ->limit(10)
                       ->get();

    return response()->json($products);
}


}