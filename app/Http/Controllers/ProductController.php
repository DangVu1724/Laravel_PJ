<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::query();

        // Lọc theo category nếu có
        if ($request->has('category_id') && $request->category_id != 'all' && $request->category_id != 'null') {
            $categoryId = $request->category_id;
            $query->whereHas('category', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId); // Chỉ rõ 'categories.id'
            });
        }

        $products = $query->paginate(10);
        $products->withPath('/admin/product');
        $categories = Category::all();

        return view('admin.product.index', compact('products', 'categories'));
    }
    
    




    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
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
            'size' => 'nullable|array', // Size có thể là mảng hoặc null
            'size.*' => 'string', // Mỗi phần tử trong size phải là chuỗi
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        // Xử lý ảnh nếu có
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // Tạo sản phẩm mới
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'size' => $request->size ? json_encode($request->size) : null, // Lưu size dưới dạng JSON
            'description' => $request->description,
        ]);

        // Gắn các category vào sản phẩm
        $product->category()->attach($request->category_id);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }



    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->size = json_decode($product->size, true); // Chuyển JSON thành mảng

        return view('admin.product.edit', compact('categories', 'product'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'size' => 'nullable|array', // Size có thể là mảng
            'size.*' => 'string', // Các giá trị trong size phải là chuỗi
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        // Cập nhật thông tin sản phẩm
        $data = $request->except('category_id');

        // Xử lý ảnh nếu có
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Cập nhật size
        $data['size'] = $request->size ? json_encode($request->size) : null;

        $product->update($data);

        // Cập nhật category của sản phẩm
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