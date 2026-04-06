<?php

namespace App\Http\Controllers;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        return view('dashboard', compact('totalEmployees'));
    }
}
