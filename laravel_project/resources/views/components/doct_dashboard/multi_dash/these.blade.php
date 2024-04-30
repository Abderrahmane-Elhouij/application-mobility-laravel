@extends('components.doct_dashboard.dashboard')

@section('dynamic-content')
    <div class="container mt-5">
        <h2 class="mb-4">Liste des thèses:</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Nom Encadrant</th>
                    <th scope="col">Prénom Encadrant</th>
                    <th scope="col">Date Inscription</th>
                    <th scope="col">Description Sujet</th>
                    <th scope="col">Description Travaux</th>
                    <th scope="col">Pertinence et Impact</th>
                    <th scope="col">CRÉÉ À</th>
            </thead>
            <tbody>
                @php
                    $theses = \App\Models\These::where('user_id', auth()->id())->paginate(3);
                @endphp
                @if ($theses->count() > 0)
                    @foreach ($theses->sortByDesc('created_at') as $these)
                        <tr>
                            <td>{{ $these->id }}</td>
                            <td>{{ $these->titre }}</td>
                            <td>{{ $these->nom_encadrant }}</td>
                            <td>{{ $these->prenom_encadrant }}</td>
                            <td>{{ $these->date_inscription }}</td>
                            <td>{{ $these->description_sujet }}</td>
                            <td>{{ $these->description_traveaux }}</td>
                            <td>{{ $these->pertience_et_Impact }}</td>
                            <td>{{ $these->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $theses->links() }}
    </div>

@endsection
