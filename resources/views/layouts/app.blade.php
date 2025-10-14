<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | RoomieMatch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Card hover effect */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            transition: all 0.3s ease-in-out;
        }

        /* Image hover effect */
        .img-fluid:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }

        /* Button hover */
        .btn-primary:hover {
            background-color: #004aad;
            transform: scale(1.05);
            transition: all 0.2s ease-in-out;
        }
        img.responsive {
    max-width: 100%;
    height: auto;
    max-height: 400px; /* adjust as needed */
}

    </style>
</head>
<body class="bg-light">
    @include('partials.header')

    <div class="container my-5">
        @yield('content')
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
