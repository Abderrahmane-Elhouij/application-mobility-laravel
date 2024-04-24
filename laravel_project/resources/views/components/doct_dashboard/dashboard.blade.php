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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-home" style="color: white;"></i> <span style="color: white;">Home</span>
                </a>
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-view="welcome">
                                <i class="fas fa-user"></i> Welcome User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-view="candidates">
                                <i class="fas fa-users"></i> Candidates
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-view="theses">
                                <i class="fas fa-file-alt"></i> Theses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-view="publications">
                                <i class="fas fa-book"></i> Publications & Revues
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-view="communications">
                                <i class="fas fa-comment"></i> Communications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-view="mobilites">
                                <i class="fas fa-bus"></i> Mobilites
                            </a>
                        </li>
                        <li class="nav-item">
                            <button class="logout-btn nav-link" onclick="logout()">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="content">
                    <div id="view-container">
                        <!-- Views will be loaded here -->
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to load views dynamically
        function loadView(viewName) {
            if (viewName === 'welcome') {
                $('#view-container').html('<h2 id="welcome-msg">Welcome User!</h2>');
                if ($('#add-candidature').length === 0) {
                    $('#view-container').append(
                        '<button class="btn btn-primary" id="add-candidature" style="background-color: #8b4513; color: #fff;">Ajouter une candidature</button>'
                        );
                }
            } else {
                $.get(`/multi_dash/${viewName}.blade.php`, function(data) {
                    $('#view-container').html(data);
                });
            }
        }

        // Event listener for navigation links
        $('.nav-link').click(function(event) {
            event.preventDefault();
            var viewName = $(this).data('view');
            loadView(viewName);
        });

        // Function to handle logout
        function logout() {
            // Here, you'll handle the logout action
            alert('Logging out...');
        }

        // Event listener for "Ajouter une candidature" button
        $(document).on('click', '#add-candidature', function() {
            // Here, you'll add logic to handle adding a candidature
            alert('Ajouter une candidature clicked!');
        });

        // Load the welcome view by default
        loadView('welcome');
    </script>
</body>

</html>
