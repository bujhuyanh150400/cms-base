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
        Schema::create('user', function (Blueprint $table) {
            $table->comment('table dùng để lưu trữ nhân sự');
            $table->id();
            $table->string('name')->comment('Tên nhân sự');
            $table->string('email')->unique()->comment('Email nhân sự ( dùng để đăng nhập)');
            $table->string('password')->comment('Password nhân sự');
            $table->timestamp('birth')->comment('Ngày sinh nhân sự');
            $table->text('avatar')->nullable()->comment('Avatar của nhân sự');
            $table->smallInteger('gender')->default(1)->comment('Giới tính: 1 - Nam | 2 - nữ');
            $table->integer('access_login')->comment('Quyền đăng nhập');
            $table->string('phone')->nullable()->comment('SĐT Nhân viên');
            $table->text('address')->nullable()->comment('Địa chỉ nơi ở nhân viên');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('updated_by')->nullable()->comment('Người tạo + người cập nhật thông tin');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
