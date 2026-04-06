<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    protected $fillable = [
        'employee_id',
        'address_line',
        'city',
        'state',
        'zip_code'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}