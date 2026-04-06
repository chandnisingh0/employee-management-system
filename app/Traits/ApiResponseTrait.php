<?php

namespace App\Traits;
use App\Models\EmployeeAddress;

trait ApiResponseTrait
{
    public function success($message, $data = null)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ]);
    }

    public function error($message, $errors = [])
    {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], 422);
    }
    public function saveAddresses($employee, $data)
    {
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
}
