<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('employees', 'email')->ignore($this->route('id'))
            ],
            'position' => 'required|string',
            'salary' => 'required|numeric',

            'address_line.*' => 'required|string',
            'city.*' => 'required|string',
            'state.*' => 'required|string',
            'zip_code.*' => 'required|string',
        ];
    }
}
