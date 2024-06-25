<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Memuat jQuery (diperlukan oleh Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Memuat file JavaScript Bootstrap (minified) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Your custom styles -->
    <style>
        body {
            padding-top: 50 px; /* Adjusted for the fixed navbar height */
            overflow-x: hidden;
        }

        #sidebar {
            height: 100vh;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #3498db; /* Background color */
            padding-top: 20px;
            padding-right: 10px;
            padding-bottom: 40px; /* Corrected padding declaration */
        }

        #sidebar a {
            padding: 8px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            margin-left: 10px;
            margin-top: 10px;
        }

        #sidebar a:hover {
            background-color: #2980b9; /* Hover background color */
        }

        #content {
            margin-left: 250px; /* Adjusted for the fixed sidebar width */
        }

        /* Adjustments for small screens */
        @media (max-width: 768px) {
            #sidebar {
                width: 100%;
                position: static;
                height: auto;
            }

            #content {
                padding-right: 250px;
                
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="text-center mb-4">
            <h3 class="text-white">Management Member Gym</h3>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="{{ route('beranda') }}">Beranda</a>
            </li>
            <li>
                <a href="{{ route('member.list') }}">Daftar Member</a>
            </li>

        </ul>
    </nav>

    <!-- Main Content -->
    <div id="content" class="row">
        @yield('content')
    </div>


    

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
