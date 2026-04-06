@extends('layouts.app')

@section('content')

<div class="card p-4" style="background:#020617; border:1px solid #1e293b;">

    <!-- Header -->
    <div class="mb-4">
        <h4 class="mb-1 text-light">{{ $employee->name }}</h4>
        <small class="text-muted">Employee Address Details</small>
    </div>

    <!-- Address Cards -->
    <div class="row">
        @foreach($employee->addresses as $addr)
        <div class="col-md-6 mb-3">
            <div class="p-3 rounded h-100"
                style="background:#0f172a; border:1px solid #334155; transition:0.3s;">

                <div class="mb-2 text-light fw-semibold">
                    {{ $addr->address_line }}
                </div>

                <div class="text-muted small">
                    {{ $addr->city }}, {{ $addr->state }}
                </div>

                <div class="text-info small">
                    ZIP: {{ $addr->zip_code }}
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection