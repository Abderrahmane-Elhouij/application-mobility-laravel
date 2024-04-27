@extends('components.doct_dashboard.dashboard')

@section('dynamic-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bienvenue, {{ auth()->user()->nom }}</div>

                    <div class="card-body">
                        <p>Bonjour {{ auth()->user()->prenom }} {{ auth()->user()->nom }}!</p>
                        <a href="{{ route('mobility') }}" class="btn btn-primary" style="background-color: #8b4513;">Ajouter une
                            condidature</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
