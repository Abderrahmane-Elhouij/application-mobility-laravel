@extends('components.enseignant.ens_dashboard.main_ens_dashboard')

@section('dynamic-content')
    <div class="container mt-5">
        <h2 class="mb-4">Liste des condidatures:</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Structure de recherche</th>
                    <th scope="col">Etablissement</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Description des traveaux</th>
                    <th scope="col">Pertinence et impact</th>
                    <th scope="col">CRÉÉ À</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $condidats = \App\Models\CondidatEns::where('user_id', auth()->id())->get();
                @endphp
                @if ($condidats->count() > 0)
                    @foreach ($condidats->sortByDesc('created_at') as $condidat)
                        <tr>
                            <td>{{ $condidat->id }}</td>
                            <td>{{ $condidat->structure_de_recherche }}</td>
                            <td>{{ $condidat->etablissement }}</td>
                            <td>{{ $condidat->telephone }}</td>
                            <td>{{ $condidat->description_traveaux }}</td>
                            <td>{{ $condidat->pertinence_impact }}</td>
                            <td>{{ $condidat->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
