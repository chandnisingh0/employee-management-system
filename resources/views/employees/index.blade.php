@extends('layouts.app')

@section('content')
<style>
    .custom-table {
        background: #1e293b;
        border-radius: 10px;
        overflow: hidden;
    }

    .custom-table thead {
        background: #0f172a;
    }

    .custom-table th {
        border: none;
        font-weight: 500;
    }

    .custom-table td {
        border-color: #334155;
        background: #1e293b;
    }

    .custom-table tbody tr {
        transition: 0.2s;
    }

    .custom-table tbody tr:hover {
        background: #334155;
    }

    .table input.form-control {
        background: #0f172a;
        border: 1px solid #334155;
        color: #e2e8f0;
    }
</style>
<div class="card p-3 p-md-4">

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div>
            <h4 class="mb-0">Employees</h4>
            <small class="text-muted">Manage all employee records</small>
        </div>
       <form method="GET" class="d-flex align-items-center gap-2">

    <input type="text" name="search" value="{{ request('search') }}"
        class="form-control bg-dark text-light border-secondary"
        placeholder="Search..."
        style="max-width: 220px; width: 100%;">

    <select name="sort_by" class="form-control bg-dark text-light border-secondary">
        <option value="id">Latest</option>
        <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
        <option value="salary" {{ request('sort_by') == 'salary' ? 'selected' : '' }}>Salary</option>
    </select>

    <select name="order" class="form-control bg-dark text-light border-secondary">
        <option value="desc">Desc</option>
        <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Asc</option>
    </select>

    <button class="btn btn-primary">Apply</button>

    <a href="{{ route('employees.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i>
    </a>

</form>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table align-middle custom-table table-dark">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody id="employee-table">
                @foreach($employees as $emp)
                <tr>
                    <td>{{ $emp->name }}</td>
                    <td class="text-muted">{{ $emp->email }}</td>
                    <td>{{ $emp->position }}</td>
                    <td>₹ {{ $emp->salary }}</td>
                    <td class="text-end">

                        <a href="{{ route('employees.show', $emp->id) }}" class="btn btn-sm btn-outline-info">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $employees->links() }}
    </div>

</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('#search').on('keyup', function(){
            let value = $(this).val().toLowerCase();
            $('#employee-table tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endpush