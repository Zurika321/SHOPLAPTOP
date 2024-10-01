<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees'; // Đảm bảo rằng bạn sử dụng đúng tên bảng
    protected $primaryKey = 'BusinessEntityID'; // Đặt khóa chính nếu nó khác với 'id'
    public $timestamps = false; // Tắt tính năng timestamps

    protected $fillable = [
        'NationalIDNumber',
        'LoginID',
        'JobTitle',
        'BirthDate',
        'MaritalStatus',
        'Gender',
        'HireDate',
        'OrganizationNode',
        'OrganizationLevel',
        'VacationHours',
        'SickLeaveHours',
    ];

    public function employeeDepartmentHistories()
    {
        return $this->hasMany(History::class, 'employee_id'); // Quan hệ 1-nhiều với EmployeeDepartmentHistory
    }

    public function getId()
    {
        return $this->attributes['BusinessEntityID'];
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_employee', 'employee_id', 'department_id');
    }


}
