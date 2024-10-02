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
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('DepartmentID')->primary(); // Khóa chính
            $table->longText('Name');
            $table->longText('GroupName');
            $table->timestamp('ModifiedDate')->nullable(); // Ngày cập nhật cuối
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
         
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
