<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Tạo các sản phẩm mẫu
    $product1 = Product::create([
        'name' => 'T-shirt',
        'description' => 'A comfortable T-shirt',
        'price' => 20,
        'stock' => 100,
        'image' => 'images/T-shirt-Nữ.jpg',  
    ]);

    $product2 = Product::create([
        'name' => 'Jeans',
        'description' => 'Stylish blue jeans',
        'price' => 30,
        'stock' => 50,
        'image' => 'images/Jeans-Nữ.jpg',  
    ]);

    $product3 = Product::create([
        'name' => 'Hoodie',
        'description' => 'Warm and cozy hoodie',
        'price' => 40,
        'stock' => 80,
        'image' => 'images/hoodie-nam.jpg',  
    ]);

    $product4 = Product::create([
        'name' => 'Sweater',
        'description' => 'Comfortable and stylish sweater',
        'price' => 25,
        'stock' => 70,
        'image' => 'images/Sweater-Nữ.jpg',  
    ]);

    $product5 = Product::create([
        'name' => 'Jacket',
        'description' => 'Trendy winter jacket',
        'price' => 50,
        'stock' => 40,
        'image' => 'images/Áokhoác-nam.jpg',  
    ]);

    $product6 = Product::create([
        'name' => 'Pants',
        'description' => 'Casual pants for everyday wear',
        'price' => 35,
        'stock' => 60,
        'image' => 'images/pant-nữ.jpg',  
    ]);

    $product7 = Product::create([
        'name' => 'Sneakers',
        'description' => 'Comfortable sneakers for casual wear',
        'price' => 45,
        'stock' => 90,
        'image' => 'images/sneaker-nam.jpg',  
    ]);

    $product8 = Product::create([
        'name' => 'Boots',
        'description' => 'Stylish boots for winter',
        'price' => 60,
        'stock' => 50,
        'image' => 'images/boots-nữ.jpg',  
    ]);

    $product9 = Product::create([
        'name' => 'Tote Bag',
        'description' => 'Spacious and stylish tote bag',
        'price' => 25,
        'stock' => 120,
        'image' => 'images/ToteBag-nữ.jpg',  
    ]);

    $product10 = Product::create([
        'name' => 'Backpack',
        'description' => 'Durable backpack for daily use',
        'price' => 35,
        'stock' => 80,
        'image' => 'images/Backpack-nữ.jpg',  
    ]);

    $product11 = Product::create([
        'name' => 'Cap',
        'description' => 'Trendy cap for casual wear',
        'price' => 15,
        'stock' => 150,
        'image' => 'images/cap-nam.jpg',  
    ]);

    $product12 = Product::create([
        'name' => 'Socks',
        'description' => 'Comfortable socks for everyday use',
        'price' => 5,
        'stock' => 200,
        'image' => 'images/tat-nu.jpg',  
    ]);

        // Gán danh mục cho sản phẩm
        // Gán lại danh mục sản phẩm
$product1->category()->attach([4, 1]); // "Áo thun" và "Nam"
$product2->category()->attach([7, 2]); // "Quần" và "Nữ"
$product3->category()->attach([5, 1]); // "Áo hoodie" và "Nam"
$product4->category()->attach([6, 2]); // "Áo Sweater" và "Nữ"
$product5->category()->attach([11, 1]); // "Áo khoác" và "Nam"
$product6->category()->attach([7, 2]); // "Quần" và "Nữ"

// Chuyển tất cả các sản phẩm thuộc "Mũ" và "Tất" sang "Phụ kiện"
$product7->category()->attach([8, 1]); // "Phụ kiện" và "Nam" cho "Sneakers"
$product8->category()->attach([8, 1]); // "Phụ kiện" và "Nam" cho "Boots"
$product9->category()->attach([8, 2]); // "Phụ kiện" và "Nữ" cho "Tote Bag"
$product10->category()->attach([8, 2]); // "Phụ kiện" và "Nữ" cho "Backpack"
$product11->category()->attach([8, 1]); // "Phụ kiện" và "Nam" cho "Cap" (trước là Mũ)
$product12->category()->attach([8, 2]); // "Phụ kiện" và "Nữ" cho "Socks" (trước là Tất)

    }
}
