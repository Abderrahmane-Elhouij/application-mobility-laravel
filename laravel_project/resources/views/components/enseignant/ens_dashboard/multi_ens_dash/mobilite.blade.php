@extends('components.enseignant.ens_dashboard.main_ens_dashboard')

@section('dynamic-content')
    <div class="container mt-5">
        <h2 class="mb-4">Liste des mobilités:</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th> <!-- New column for ID -->
                    <th scope="col">Université d'Accueil</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Date Début</th>
                    <th scope="col">Date Fin</th>
                    <th scope="col">Carte Mobilité</th>
                    <th scope="col">Joindre Justificatif</th>
                    <th scope="col">Créé à</th> <!-- New column for created_at -->
                </tr>
            </thead>
            <tbody>
                @php
                    $mobilites = \App\Models\MobiliteEns::where('user_id', auth()->id())->paginate();
                @endphp
                @if ($mobilites->count() > 0)
                    @foreach ($mobilites->sortByDesc('created_at') as $mobilite)
                        <tr>
                            <td>{{ $mobilite->id }}</td> <!-- ID column -->
                            <td>{{ $mobilite->universite_dacceuil }}</td>
                            <td>{{ $mobilite->ville }}</td>
                            <td>{{ $mobilite->pays }}</td>
                            <td>{{ $mobilite->date_debut }}</td>
                            <td>{{ $mobilite->date_fin }}</td>
                            <td>{{ $mobilite->carte_mobilite }}</td>
                            <td>{{ $mobilite->joindre_justicatif }}</td>
                            <td>{{ $mobilite->created_at->format('Y-m-d H:i:s') }}</td>
                            <!-- Format the created_at date -->
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">No data available</td> <!-- colspan increased to 10 for the new columns -->
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $mobilites->links() }}
    </div>
@endsection
