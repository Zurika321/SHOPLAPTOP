<?php

use App\Http\Controllers\admin\AdminDepartmentController;
use App\Http\Controllers\admin\AdminEmployeeController;
use App\Http\Controllers\AdminHistoryController;
use App\Http\Controllers\AdminShiftController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class,'index'])->name("employee.index");

Route::get('/employee/{BusinessEntityID}', [EmployeeController::class,'show'])->name("employee.show");

Route::get('/department',[DepartmentController::class,'index'])->name("department.index");

Route::get('/department/{DepartmentID}',[DepartmentController::class,'show'])->name("department.show");

Route::get('/history',[HistoryController::class,'index'])->name("history.index");

Route::get('/history/{id}', [HistoryController::class, 'show'])->name("history.show");

Route::get('/shift',[ShiftController::class,'index'])->name("shift.index");

Route::get('/shift/{ShiftID}', [ShiftController::class, 'show'])->name('shift.show');

Route::get('/admin', [AdminEmployeeController::class, 'index'])->name('admin.index');

Route::resource('/admin/employees', AdminEmployeeController::class)
    ->names([
        'index' => 'admin.employees.index',
        'create' => 'admin.employees.create',
        'store' => 'admin.employees.store',
        'show' => 'admin.employees.show',
        'edit' => 'admin.employees.edit',
        'update' => 'admin.employees.update',
        'destroy' => 'admin.employees.destroy',
    ]);

Route::resource('admin/departments', AdminDepartmentController::class)
    ->names([
        'index' => 'admin.departments.index',
        'create' => 'admin.departments.create',
        'store' => 'admin.departments.store',
        'show' => 'admin.departments.show',
        'edit' => 'admin.departments.edit',
        'update' => 'admin.departments.update',
        'destroy' => 'admin.departments.destroy'
    ]);

    Route::resource('admin/history', AdminHistoryController::class)
    ->names([
        'index' => 'admin.history.index',
        // 'create' => 'admin.history.create',
        // 'store' => 'admin.history.store',
        // 'show' => 'admin.history.show',
        // 'edit' => 'admin.history.edit',
        // 'update' => 'admin.history.update',
        // 'destroy' => 'admin.history.destroy'
    ]);

    Route::resource('admin/shift', AdminShiftController::class)
    ->names([
        // 'index' => 'admin.shift.index',
        // 'create' => 'admin.shift.create',
        // 'store' => 'admin.shift.store',
        // 'show' => 'admin.shift.show',
        // 'edit' => 'admin.shift.edit',
        // 'update' => 'admin.shift.update',
        // 'destroy' => 'admin.shift.destroy'
    ]);
