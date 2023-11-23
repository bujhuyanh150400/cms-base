<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->comment('table dùng để hiển thị menu sản phẩm bên ngoài frontend');
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable()->comment('Khóa phụ từ bảng category');
            $table->string('title')->comment('title của menu');
            $table->text('description')->nullable()->comment('mô tả menu');
            $table->string('action')->nullable()->comment('action route');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('ID menu cha của nó');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('updated_by')->nullable()->comment('update bởi ai');
            // Định nghĩa foreign key
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('menu')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
