@extends('components.enseignant.ens_dashboard.main_ens_dashboard')

@section('dynamic-content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="mb-4">Liste des communications:</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Intitulée</th>
                    <th scope="col">Lieu</th>
                    <th scope="col">Date</th>
                    <th scope="col">Créé à</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $communications = \App\Models\CommunicationEns::where('user_id', auth()->id())->paginate();
                @endphp
                @if ($communications->count() > 0)
                    @foreach ($communications->sortByDesc('created_at') as $communication)
                        <tr>
                            <td>{{ $communication->id }}</td>
                            <td>{{ $communication->titre }}</td>
                            <td>{{ $communication->intitulee }}</td>
                            <td>{{ $communication->lieu }}</td>
                            <td>{{ $communication->date }}</td>
                            <td>{{ $communication->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>

        {{ $communications->links() }}

        <button type="button" style="background-color: #8b4513; color:white;" class="btn mt-3" id="toggleForm">Ajouter une
            communication</button>

        <form action="{{ route('enseignant-cree-communication') }}" id="communicationForm" class="mt-3"
            style="display: none;" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="titre">Titre:</label>
                    <input type="text" class="form-control" id="titre" name="titre" required>
                </div>
                <div class="col-md-6">
                    <label for="intitulee">Intitulée:</label>
                    <input type="text" class="form-control" id="intitulee" name="intitulee" required>
                </div>
                <div class="col-md-6">
                    <label for="lieu">Lieu:</label>
                    <input type="text" class="form-control" id="lieu" name="lieu" required>
                </div>
                <div class="col-md-6">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
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
            var form = document.getElementById('communicationForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    </script>
@endsection
