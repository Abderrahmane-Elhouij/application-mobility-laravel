@extends('components.doct_dashboard.main_dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-home" style="color: white;"></i> <span style="color: white;">Acceuil</span>
                </a>
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.view', 'welcome') }}">
                                <i class="fas fa-user"></i> Bienvenue {{ auth()->user()->nom }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.view', 'condidat') }}">
                                <i class="fas fa-users"></i> Candidatures
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.view', 'these') }}">
                                <i class="fas fa-file-alt"></i> Thèses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.view', 'publication') }}">
                                <i class="fas fa-book"></i> Publications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.view', 'communication') }}">
                                <i class="fas fa-comment"></i> Communications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.view', 'mobilite') }}">
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
@endsection
