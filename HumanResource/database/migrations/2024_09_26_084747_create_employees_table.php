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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('BusinessEntityID')->primary(); // Khóa chính
            $table->string('NationalIDNumber', 100);
            $table->text('LoginID');
            $table->longText('OrganizationNode')->nullable();
            $table->smallInteger('OrganizationLevel')->nullable();
            $table->string('JobTitle', 50);
            $table->date('BirthDate');
            $table->char('MaritalStatus', 1);
            $table->char('Gender', 1);
            $table->date('HireDate');
            $table->smallInteger('VacationHours')->default(0); // Có thể thêm giá trị mặc định
            $table->smallInteger('SickLeaveHours')->default(0); // Có thể thêm giá trị mặc định
            $table->timestamp('ModifiedDate')->nullable(); // Sử dụng timestamp cho ModifiedDate
            $table->timestamps(); // Tạo created_at và updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

