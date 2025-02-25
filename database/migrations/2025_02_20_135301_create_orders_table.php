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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID đơn hàng
            $table->unsignedBigInteger('user_id')->nullable(); // ID người dùng (nếu có đăng nhập)
            $table->string('status')->default('pending'); // Trạng thái đơn hàng (ví dụ: pending, processing, completed)
            $table->decimal('total', 10, 2); // Tổng tiền đơn hàng
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
