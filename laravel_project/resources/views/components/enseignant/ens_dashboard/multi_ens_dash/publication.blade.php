@extends('components.enseignant.ens_dashboard.main_ens_dashboard')

@section('dynamic-content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="mb-4">Liste des Publications dans les revues:</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre Article</th>
                    <th scope="col">Noms Auteurs</th>
                    <th scope="col">Titre Revue</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Numéro</th>
                    <th scope="col">Date Publication</th>
                    <th scope="col">Numéro Page</th>
                    <th scope="col">Créé à</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $publications = \App\Models\PublicationEns::where('user_id', auth()->id())->paginate();
                @endphp
                @if ($publications->count() > 0)
                    @foreach ($publications->sortByDesc('created_at') as $publication)
                        <tr>
                            <td>{{ $publication->id }}</td>
                            <td>{{ $publication->titre_article }}</td>
                            <td>{{ $publication->noms_auteurs }}</td>
                            <td>{{ $publication->titre_revue }}</td>
                            <td>{{ $publication->volume }}</td>
                            <td>{{ $publication->numero }}</td>
                            <td>{{ $publication->date_publication }}</td>
                            <td>{{ $publication->numero_page }}</td>
                            <td>{{ $publication->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>

        {{ $publications->links() }}

        <button type="button" class="btn mt-3" id="toggleForm" style="background-color: #8b4513; color:white;">Ajouter une
            publication</button>

        <form action="{{ route('enseignant-cree-publication') }}" id="publicationForm" class="mt-3"
            style="display: none;" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="titre_articlec">Titre Article:</label>
                    <input type="text" class="form-control" id="titre_articlec" name="titre_article">
                </div>
                <div class="col-md-6">
                    <label for="auteurs_publicationc">Noms Auteurs:</label>
                    <input type="text" class="form-control" id="auteurs_publicationc" name="noms_auteurs">
                </div>
                <div class="col-md-6">
                    <label for="titre_revuec">Titre Revue:</label>
                    <input type="text" class="form-control" id="titre_revuec" name="titre_revue">
                </div>
                <div class="col-md-6">
                    <label for="volumec">Volume:</label>
                    <input type="text" class="form-control" id="volumec" name="volume">
                </div>
                <div class="col-md-6">
                    <label for="numeroc">Numéro:</label>
                    <input type="text" class="form-control" id="numeroc" name="numero">
                </div>
                <div class="col-md-6">
                    <label for="date_publicationc">Date Publication:</label>
                    <input type="date" class="form-control" id="date_publication" name="date_publication">
                </div>
                <div class="col-md-6">
                    <label for="numeros_pagec">Numéro Page:</label>
                    <input type="text" class="form-control" id="numeros_pagec" name="numero_page">
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn"
                        style="background-color: #8b4513; color:white;">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Function to toggle the form visibility
        document.getElementById('toggleForm').addEventListener('click', function() {
            var form = document.getElementById('publicationForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    </script>
@endsection
