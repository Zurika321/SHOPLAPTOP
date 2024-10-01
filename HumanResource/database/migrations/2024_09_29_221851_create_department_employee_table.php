<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDepartmentHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('employee_department_history', function (Blueprint $table) {
            $table->id(); // Thêm ID cho bảng
            $table->foreignId('DepartmenID')->constrained('departments')->onDelete('cascade'); // Khóa ngoại đến bảng departments
            $table->foreignId('BusinessEntityID')->constrained('employees')->onDelete('cascade'); // Khóa ngoại đến bảng employees
            $table->timestamps(); // Để lưu thông tin thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_department_history');
    }
}

