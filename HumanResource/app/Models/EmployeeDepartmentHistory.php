<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDepartmentHistory extends Model
{
    use HasFactory;

    // Định nghĩa bảng và khóa chính
    protected $table = 'employee_department_history';
    protected $primaryKey = 'BusinessEntityID';

    // Định nghĩa các thuộc tính có thể được gán
    protected $fillable = [
        'DepartmentID',
        'ShiftID',
        'StartDate',
        'EndDate',
    ];

    // Quan hệ n-1 với bảng Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'BusinessEntityID');
    }

    // Quan hệ n-1 với bảng Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }

    // Quan hệ n-1 với bảng Shift
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'ShiftID');
    }
}
