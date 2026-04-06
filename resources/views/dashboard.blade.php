@extends('layouts.app')

@section('content')

<div class="row g-3">
    <div class="col-md-4">
        <div class="card p-4">
            <h6>Total Employees</h6>
            <h3 class="fw-bold">{{ $totalEmployees }}</h3>
        </div>
    </div>
</div>

@endsection