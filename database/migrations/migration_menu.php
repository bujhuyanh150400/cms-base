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
            $table->string('title')->comment('title của menu');
            $table->text('description')->default(null)->comment('mô tả menu');
            $table->string('action')->default(null)->comment('action route');
            $table->bigInteger('parent_id')->default(null)->comment('ID menu cha của nó');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(null);
            $table->bigInteger('updated_by')->default(null)->comment('update bởi ai');
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
