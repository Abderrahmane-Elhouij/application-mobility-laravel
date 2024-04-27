<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Your custom styles -->
    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
            /* Brownish white */
        }

        .sidebar {
            background-color: #8b4513;
            /* Brown */
            color: #fff;
            /* White text */
            height: 100vh;
            /* Set sidebar height to 100% of viewport height */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            /* Add shadow */
        }

        .sidebar .nav-link {
            color: #fff;
        }

        .sidebar .nav-link:hover {
            background-color: #cd853f;
            /* Darker brown */
        }

        .sidebar .nav-item:not(:last-child) {
            margin-bottom: 10px;
            /* Add space between sidebar items */
        }

        .sidebar .nav-item:last-child {
            margin-top: auto;
            /* Push Logout to the bottom */
        }

        .sidebar .navbar-brand {
            font-size: 1.2rem;
            padding: 20px;
        }

        .content {
            background-color: #fff;
            /* White */
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            /* Add shadow */
            padding: 20px;
            margin-top: 20px;
        }

        .logout-btn {
            background-color: transparent;
            border: none;
            color: #fff;
            cursor: pointer;
        }

        .logout-btn:hover {
            color: #ff6347;
            /* Tomato */
        }

        /* dasboard components style: */
        .table {
            background-color: #ffffff;
            /* white */
            color: #5d4037;
            /* brown */
            border: 1px solid #5d4037;
            /* brown */
        }

        .table th,
        .table td {
            border: 1px solid #5d4037;
            /* brown */
            text-align: center;
            /* Center align the text */
        }

        .table th {
            background-color: #5d4037;
            /* brown */
            color: #ffffff;
            /* white */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f5f5f5;
            /* light gray */
        }

        .table-hover tbody tr:hover {
            background-color: #795548;
            /* dark brown */
            color: #ffffff;
            /* white */
        }
    </style>
</head>

<body>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
