@extends('components.doct_dashboard.main_dashboard')

@section('content')
    <div class="container-fluid" style="background-image: linear-gradient(116deg, rgba(232, 232, 232, 0.03) 0%, rgba(232, 232, 232, 0.03) 10%,rgba(14, 14, 14, 0.03) 10%, rgba(14, 14, 14, 0.03) 66%,rgba(232, 232, 232, 0.03) 66%, rgba(232, 232, 232, 0.03) 72%,rgba(44, 44, 44, 0.03) 72%, rgba(44, 44, 44, 0.03) 81%,rgba(51, 51, 51, 0.03) 81%, rgba(51, 51, 51, 0.03) 100%),linear-gradient(109deg, rgba(155, 155, 155, 0.03) 0%, rgba(155, 155, 155, 0.03) 23%,rgba(30, 30, 30, 0.03) 23%, rgba(30, 30, 30, 0.03) 63%,rgba(124, 124, 124, 0.03) 63%, rgba(124, 124, 124, 0.03) 73%,rgba(195, 195, 195, 0.03) 73%, rgba(195, 195, 195, 0.03) 84%,rgba(187, 187, 187, 0.03) 84%, rgba(187, 187, 187, 0.03) 100%),linear-gradient(79deg, rgba(254, 254, 254, 0.03) 0%, rgba(254, 254, 254, 0.03) 27%,rgba(180, 180, 180, 0.03) 27%, rgba(180, 180, 180, 0.03) 33%,rgba(167, 167, 167, 0.03) 33%, rgba(167, 167, 167, 0.03) 34%,rgba(68, 68, 68, 0.03) 34%, rgba(68, 68, 68, 0.03) 63%,rgba(171, 171, 171, 0.03) 63%, rgba(171, 171, 171, 0.03) 100%),linear-gradient(109deg, rgba(71, 71, 71, 0.03) 0%, rgba(71, 71, 71, 0.03) 3%,rgba(97, 97, 97, 0.03) 3%, rgba(97, 97, 97, 0.03) 40%,rgba(40, 40, 40, 0.03) 40%, rgba(40, 40, 40, 0.03) 55%,rgba(5, 5, 5, 0.03) 55%, rgba(5, 5, 5, 0.03) 73%,rgba(242, 242, 242, 0.03) 73%, rgba(242, 242, 242, 0.03) 100%),linear-gradient(271deg, rgba(70, 70, 70, 0.03) 0%, rgba(70, 70, 70, 0.03) 11%,rgba(178, 178, 178, 0.03) 11%, rgba(178, 178, 178, 0.03) 23%,rgba(28, 28, 28, 0.03) 23%, rgba(28, 28, 28, 0.03) 72%,rgba(152, 152, 152, 0.03) 72%, rgba(152, 152, 152, 0.03) 86%,rgba(43, 43, 43, 0.03) 86%, rgba(43, 43, 43, 0.03) 100%),linear-gradient(90deg, rgb(238,141,39),rgb(1, 1, 1));">
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
