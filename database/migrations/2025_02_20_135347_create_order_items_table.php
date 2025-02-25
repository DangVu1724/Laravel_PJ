<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // ID chi tiết đơn hàng
            $table->unsignedBigInteger('order_id'); // ID đơn hàng
            $table->unsignedBigInteger('product_id'); // ID sản phẩm
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->decimal('price', 10, 2); // Giá sản phẩm tại thời điểm đặt hàng
            $table->timestamps(); // created_at và updated_at
    
            // Khóa ngoại
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
