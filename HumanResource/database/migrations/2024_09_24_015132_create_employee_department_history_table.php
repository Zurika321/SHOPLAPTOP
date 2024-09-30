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
        Schema::create('employee_department_history', function (Blueprint $table) {
            $table->increments('BusinessEntityID');
            $table->smallInteger('DepartmentID');
            $table->tinyInteger('ShiftID');
            $table->date('StartDate');
            $table->date('EndDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_department_history');
    }
};
