<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->comment('table danh mục , bao gồm cả menu và production');
            $table->id();
            $table->string('title')->comment('tiêu đề hiển thị');
            $table->text('description')->nullable()->comment('mô tả danh mục');
            $table->smallInteger('public')->default(1)->comment('1 - cho phép show ra front-end | 0 - Không cho show ra front-end');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('updated_by')->nullable()->comment('update bởi ai');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
