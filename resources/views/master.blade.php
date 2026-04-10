<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Travel App</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fb;
            margin: 0;
        }

        /* Smooth transition */
        * {
            transition: all 0.2s ease-in-out;
        }

        /* Container spacing biar rapi */
        .main-content {
            min-height: 80vh;
            padding-top: 30px;
            padding-bottom: 30px;
        }

        /* Navbar shadow biar elegan */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        /* Footer styling */
        footer {
            background: #ffffff;
            border-top: 1px solid #eee;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #777;
        }
    </style>

</head>

<body>

    {{-- NAVBAR --}}
    @include('partial.navbar')

    {{-- MAIN CONTENT --}}
    <div class="main-content container">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('partial.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>