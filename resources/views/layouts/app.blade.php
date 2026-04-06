<!DOCTYPE html>
<html>
<head>
    <title>Employee Panel</title>
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

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: #1e293b;
            padding: 20px;
        }

        .sidebar h5 {
            color: #fff;
        }

        .sidebar a {
            display: block;
            color: #94a3b8;
            padding: 10px;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 5px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #334155;
            color: #fff;
        }

        .main {
            margin-left: 240px;
            padding: 20px;
        }

        .topbar {
            background: #1e293b;
            padding: 10px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .card {
            background: #1e293b;
            border: none;
            border-radius: 12px;
            color: #e2e8f0;
        }

        .btn-primary {
            background: #6366f1;
            border: none;
        }

        .btn-primary:hover {
            background: #4f46e5;
        }

        .text-muted {
            color: #94a3b8 !important;
        }

        ::placeholder {
            color: #94a3b8 !important;
        }

        .address-block {
            animation: fadeSlide 0.3s ease;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 🔥 RESPONSIVE PART */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                display: none;
            }

            .main {
                margin-left: 0;
            }
        }

        @media (max-width: 576px) {
            .table {
                font-size: 12px;
            }

            .btn-sm {
                padding: 4px 6px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h5 class="mb-4">Employee Panel</h5>

        <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
        <a href="{{ route('employees.index') }}"><i class="bi bi-people me-2"></i> Employees</a>
    </div>
    <div class="main">
        <div class="topbar d-flex justify-content-between align-items-center flex-wrap gap-2">
            <button class="btn btn-sm btn-outline-light d-md-none" id="toggleSidebar">
                <i class="bi bi-list"></i>
            </button>

            <span>Welcome 👋</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>

        @yield('content')

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
    <script>
        $('#toggleSidebar').click(function(){
            $('.sidebar').toggle();
        });
    </script>
</body>
</html>