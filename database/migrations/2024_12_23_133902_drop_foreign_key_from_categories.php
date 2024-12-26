<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKeyFromCategories extends Migration
{
    public function up()
    {
        // Xoá ràng buộc khóa ngoại liên quan đến cột parent_id
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']); // Xoá ràng buộc khóa ngoại trên cột parent_id
        });
    }

    public function down()
    {
        // Nếu cần rollback, bạn có thể thêm lại khóa ngoại
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
