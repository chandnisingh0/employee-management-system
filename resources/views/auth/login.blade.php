@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<h4 class="mb-2 fw-semibold">Welcome Back 👋</h4>
<p class="text-muted mb-4">Login to your account</p>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('login.post') }}">
    @csrf

    <div class="mb-3">
        <label>Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Enter email">
        </div>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
            <span class="input-group-text" onclick="togglePassword()" style="cursor:pointer;">
                <i class="bi bi-eye"></i>
            </span>
        </div>
    </div>

    <button class="btn btn-primary w-100 mt-2">Login</button>
</form>

@endsection

@push('scripts')
<script>
function togglePassword() {
    let input = document.getElementById('password');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
@endpush