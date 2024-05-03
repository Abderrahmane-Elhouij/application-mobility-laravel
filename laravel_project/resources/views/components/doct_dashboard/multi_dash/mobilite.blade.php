@extends('components.doct_dashboard.dashboard')

@section('dynamic-content')
    <div class="container mt-5">
        <h2 class="mb-4">Liste des mobilités:</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th> 
                    <th scope="col">Université d'Accueil</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Date Début</th>
                    <th scope="col">Date Fin</th>
                    <th scope="col">Carte Mobilité</th>
                    <th scope="col">Joindre Justificatif</th>
                    <th scope="col">Créé à</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $mobilites = \App\Models\Mobilite::where('user_id', auth()->id())->paginate(3);
                @endphp
                @if ($mobilites->count() > 0)
                    @foreach ($mobilites->sortByDesc('created_at') as $mobilite)
                        <tr>
                            <td>{{ $mobilite->id }}</td>
                            <td>{{ $mobilite->universite_dacceuil }}</td>
                            <td>{{ $mobilite->ville }}</td>
                            <td>{{ $mobilite->pays }}</td>
                            <td>{{ $mobilite->date_debut }}</td>
                            <td>{{ $mobilite->date_fin }}</td>
                            <td>{{ $mobilite->carte_mobilite }}</td>
                            <td>{{ $mobilite->joindre_justicatif }}</td>
                            <td>{{ $mobilite->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $mobilites->links() }}
    </div>
@endsection
