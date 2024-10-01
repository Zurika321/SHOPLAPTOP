<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $primaryKey = 'ShiftID';
    protected $fillable = ['Name', 'StartTime', 'EndTime', 'ModifiedDate'];

    public function employeeHistories()
    {
        return $this->hasMany(History::class, 'ShiftID');
    }
}
