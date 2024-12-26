<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Men', 'description' => 'Sản phẩm dành cho Nam'],
            ['name' => 'Women', 'description' => 'Sản phẩm dành cho Nữ'],
            ['name' => 'Shirts', 'description' => 'Áo sơ mi'],
            ['name' => 'T-Shirts', 'description' => 'Áo thun'],
            ['name' => 'Hoodies', 'description' => 'Áo hoodie'],
            ['name' => 'Sweater', 'description' => 'Áo Sweater'],
            ['name' => 'Pants', 'description' => 'Quần'],
            ['name' => 'Accessories', 'description' => 'Phụ kiện'],
            ['name' => 'Sportswear', 'description' => 'Đồ thể thao'],
            ['name' => 'Sleepwear', 'description' => 'Đồ ngủ'],
            ['name' => 'Jackets', 'description' => 'Áo khoác'],
            ['name' => 'Shorts', 'description' => 'Quần short'],
            ['name' => 'Sweatpants', 'description' => 'Quần thể thao'],
            ['name' => 'Underwear', 'description' => 'Đồ lót'],
            ['name' => 'Hats', 'description' => 'Mũ'],
            ['name' => 'Socks', 'description' => 'Tất'],
        ];
        

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

