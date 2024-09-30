<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // Định nghĩa bảng và khóa chính
    protected $table = 'departments';
    protected $primaryKey = 'DepartmentID';

    // Định nghĩa các thuộc tính có thể được gán
    protected $fillable = [
        'Name',
        'GroupName',
    ];

    // Quan hệ 1-n với bảng EmployeeDepartmentHistory
    public function departmentHistories()
    {
        return $this->hasMany(EmployeeDepartmentHistory::class, 'DepartmentID');
    }
}
