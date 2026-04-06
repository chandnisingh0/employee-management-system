<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\EmployeeAddress;
use Illuminate\Support\Facades\DB;

class EmployeeService
{
    public function save($data, $employee = null)
    {
        return DB::transaction(function () use ($data, $employee) {
            if ($employee) {
                $employee->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'position' => $data['position'],
                    'salary' => $data['salary'],
                ]);

                $employee->addresses()->delete();
            } else {
                $employee = Employee::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'position' => $data['position'],
                    'salary' => $data['salary'],
                ]);
            }

            if (isset($data['address_line'])) {
                foreach ($data['address_line'] as $key => $address) {
                    EmployeeAddress::create([
                        'employee_id' => $employee->id,
                        'address_line' => $address,
                        'city' => $data['city'][$key],
                        'state' => $data['state'][$key],
                        'zip_code' => $data['zip_code'][$key],
                    ]);
                }
            }
            return $employee;
        });
    }
    public function delete($employee)
    {
        return $employee->delete();
    }
}