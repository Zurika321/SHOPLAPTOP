<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentEmployeeTable extends Migration
{
    public function up()
    {
        Schema::create('department_employee', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('employee_id');
            $table->primary(['department_id', 'employee_id']); // Đặt khóa chính cho cặp khóa
        
            // Định nghĩa khóa ngoại
            $table->foreign('department_id')->references('DepartmentID')->on('departments')->onDelete('cascade');
            $table->foreign('employee_id')->references('BusinessEntityID')->on('employees')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('department_employee');
    }
}

