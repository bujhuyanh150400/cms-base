<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_role', function (Blueprint $table) {
            $table->id('id_role');
            $table->string('title');
            $table->text('description');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at');
            $table->bigInteger('updated_by')->default(null);
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
