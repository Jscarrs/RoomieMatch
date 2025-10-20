<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin - RoomieMatch</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .sidebar { height: 100vh; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.2); transition: all 0.3s; }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 d-none d-md-block bg-light sidebar pt-3">
                <nav class="nav flex-column">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}">Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Listings</a></li>
                    </ul>
                </nav>
            </div>

            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
