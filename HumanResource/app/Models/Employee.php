<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    // Định nghĩa bảng và khóa chính
    protected $table = 'employees';
    protected $primaryKey = 'BusinessEntityID';

    // Định nghĩa các thuộc tính có thể được gán
    protected $fillable = [
        'FirstName',
        'LastName',
        'JobTitle',
        // Thêm các thuộc tính khác nếu cần
    ];

    // Quan hệ 1-n với bảng EmployeeDepartmentHistory
    public function departmentHistories()
    {
        return $this->hasMany(EmployeeDepartmentHistory::class, 'BusinessEntityID');
    }
}
