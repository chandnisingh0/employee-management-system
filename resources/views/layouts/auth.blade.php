<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            color: #e2e8f0;
        }
        .login-container {
            min-height: 100vh;
        }
        .login-card {
            border-radius: 18px;
            overflow: hidden;
            background: #1e293b;
            box-shadow: 0 20px 50px rgba(0,0,0,0.4);
            animation: fadeIn 0.5s ease;
        }
        .brand-section {
            background: #1e293b;
            border-right: 1px solid #334155;
        }

        .brand-section img {
            max-width: 200px;
            opacity: 0.9;
            transition: 0.3s;
        }

        .brand-section img:hover {
            transform: scale(1.05);
        }

        .form-section {
            background: #1e293b;
        }

        .form-control {
            background: #0f172a;
            border: 1px solid #334155;
            color: #e2e8f0;
            border-radius: 10px;
        }

        .form-control:focus {
            background: #0f172a;
            border-color: #6366f1;
            box-shadow: 0 0 0 2px rgba(99,102,241,0.2);
            color: white;
        }

        .input-group-text {
            background: #0f172a;
            border: 1px solid #334155;
            color: #94a3b8;
        }

        .btn-primary {
            background: #6366f1;
            border: none;
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #4f46e5;
            transform: translateY(-1px);
        }

        .text-muted {
            color: #94a3b8 !important;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .brand-section {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid login-container d-flex align-items-center justify-content-center">
    <div class="row login-card w-100" style="max-width: 900px;">
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center brand-section p-4 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">

            <h4 class="fw-semibold mt-3">Employee Management</h4>
            <p class="text-muted small">Simple • Fast • Efficient</p>
        </div>
        <div class="col-md-6 p-4 p-md-5 form-section">
            @yield('content')
        </div>
    </div>
</div>

@stack('scripts')

</body>
</html>