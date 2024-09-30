<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    // Định nghĩa bảng và khóa chính
    protected $table = 'shifts';
    protected $primaryKey = 'ShiftID';

    // Định nghĩa các thuộc tính có thể được gán
    protected $fillable = [
        'Name',
        'StartTime',
        'EndTime',
    ];

    // Quan hệ 1-n với bảng EmployeeDepartmentHistory
    public function departmentHistories()
    {
        return $this->hasMany(EmployeeDepartmentHistory::class, 'ShiftID');
    }
}
