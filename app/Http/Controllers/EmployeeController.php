<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\EmployeeService;
use App\Http\Requests\StoreEmployeeRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
class EmployeeController extends Controller
{
    use ApiResponseTrait;
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request)
    {
        $query = Employee::query();
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('position', 'like', '%' . $request->search . '%');
            });
        }
        $sortBy = $request->sort_by ?? 'id';
        $order = $request->order ?? 'desc';
        $employees = $query->orderBy($sortBy, $order)->paginate(10)->appends($request->all());
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.form');
    }

    public function edit(Employee $employee)
    {
        $employee->load('addresses');
        return view('employees.form', compact('employee'));
    }
    public function save(StoreEmployeeRequest $request, $id = null)
    {
        $employee = $id ? Employee::findOrFail($id) : null;
        $employee = $this->employeeService->save(
            $request->validated(),
            $employee
        );
        return $this->success(
            $id ? 'Employee updated successfully' : 'Employee created successfully',
            $employee
        );
    }

    public function destroy(Employee $employee)
    {
        $this->employeeService->delete($employee);
        return back()->with('success', 'Employee deleted successfully');
    }

    public function show(Employee $employee)
    {
        $employee->load('addresses');
        return view('employees.show', compact('employee'));
    }
}