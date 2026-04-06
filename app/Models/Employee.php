<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'position',
        'salary'
    ];

    public function addresses()
    {
        return $this->hasMany(EmployeeAddress::class);
    }
}