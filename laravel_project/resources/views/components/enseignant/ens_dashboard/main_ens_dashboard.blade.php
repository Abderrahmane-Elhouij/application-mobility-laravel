<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enseignant Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom Styles */
        body {
            background-image: linear-gradient(116deg, rgba(232, 232, 232, 0.03) 0%, rgba(232, 232, 232, 0.03) 10%, rgba(14, 14, 14, 0.03) 10%, rgba(14, 14, 14, 0.03) 66%, rgba(232, 232, 232, 0.03) 66%, rgba(232, 232, 232, 0.03) 72%, rgba(44, 44, 44, 0.03) 72%, rgba(44, 44, 44, 0.03) 81%, rgba(51, 51, 51, 0.03) 81%, rgba(51, 51, 51, 0.03) 100%), linear-gradient(109deg, rgba(155, 155, 155, 0.03) 0%, rgba(155, 155, 155, 0.03) 23%, rgba(30, 30, 30, 0.03) 23%, rgba(30, 30, 30, 0.03) 63%, rgba(124, 124, 124, 0.03) 63%, rgba(124, 124, 124, 0.03) 73%, rgba(195, 195, 195, 0.03) 73%, rgba(195, 195, 195, 0.03) 84%, rgba(187, 187, 187, 0.03) 84%, rgba(187, 187, 187, 0.03) 100%), linear-gradient(79deg, rgba(254, 254, 254, 0.03) 0%, rgba(254, 254, 254, 0.03) 27%, rgba(180, 180, 180, 0.03) 27%, rgba(180, 180, 180, 0.03) 33%, rgba(167, 167, 167, 0.03) 33%, rgba(167, 167, 167, 0.03) 34%, rgba(68, 68, 68, 0.03) 34%, rgba(68, 68, 68, 0.03) 63%, rgba(171, 171, 171, 0.03) 63%, rgba(171, 171, 171, 0.03) 100%), linear-gradient(109deg, rgba(71, 71, 71, 0.03) 0%, rgba(71, 71, 71, 0.03) 3%, rgba(97, 97, 97, 0.03) 3%, rgba(97, 97, 97, 0.03) 40%, rgba(40, 40, 40, 0.03) 40%, rgba(40, 40, 40, 0.03) 55%, rgba(5, 5, 5, 0.03) 55%, rgba(5, 5, 5, 0.03) 73%, rgba(242, 242, 242, 0.03) 73%, rgba(242, 242, 242, 0.03) 100%), linear-gradient(271deg, rgba(70, 70, 70, 0.03) 0%, rgba(70, 70, 70, 0.03) 11%, rgba(178, 178, 178, 0.03) 11%, rgba(178, 178, 178, 0.03) 23%, rgba(28, 28, 28, 0.03) 23%, rgba(28, 28, 28, 0.03) 72%, rgba(152, 152, 152, 0.03) 72%, rgba(152, 152, 152, 0.03) 86%, rgba(43, 43, 43, 0.03) 86%, rgba(43, 43, 43, 0.03) 100%), linear-gradient(90deg, rgb(238, 141, 39), rgb(1, 1, 1));
            /* margin: 0;
            padding: 0;
            background-image: url("{{ asset('images/background.jpg') }}");
            background-size: cover;
            background-position: center;
            background-color: #f8f9fa; */
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

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-home" style="color: white;"></i> <span style="color: white;">Acceuil</span>
                </a>
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard_ens.view', 'welcome') }}">
                                <i class="fas fa-user"></i> Bienvenue {{ auth()->user()->nom }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard_ens.view', 'condidat') }}">
                                <i class="fas fa-users"></i> Candidatures
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard_ens.view', 'publication') }}">
                                <i class="fas fa-book"></i> Publications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard_ens.view', 'communication') }}">
                                <i class="fas fa-comment"></i> Communications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard_ens.view', 'mobilite') }}">
                                <i class="fas fa-bus"></i> Mobilités
                            </a>
                        </li>
                        <li class="nav-item">
                            <form class="logout-btn nav-link" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button style="background-color: transparent; border: none; color: inherit;"><i
                                        class="fas fa-sign-out-alt"></i> Se déconnecter</button>
                            </form>
                        </li>
                    </ul><br><br>
                    <div class="text-center">
                        <img src="{{ asset('images/png_icon.png') }}" alt="Sidebar Image"
                            style="max-width: 50px; height: auto; filter: brightness(0) invert(1);">
                    </div>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="content">
                    @yield('dynamic-content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
