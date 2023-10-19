<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** Commnent:
     * user_department: Phòng ban
     * user_position: chức vụ
     * status: trạng thái
     */
    public function up(): void
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name');
            $table->string('user_email')->unique();
            $table->text('user_password');
            $table->timestamp('user_birth');
            $table->integer('user_department')->default(0);
            $table->integer('user_position')->default(0);
            $table->text('user_phone');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};