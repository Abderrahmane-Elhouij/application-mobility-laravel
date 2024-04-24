<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Table</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles */
        .table {
            background-color: #ffffff;
            /* white */
            color: #5d4037;
            /* brown */
            border: 1px solid #5d4037;
            /* brown */
        }

        .table th,
        .table td {
            border: 1px solid #5d4037;
            /* brown */
            text-align: center;
            /* Center align the text */
        }

        .table th {
            background-color: #5d4037;
            /* brown */
            color: #ffffff;
            /* white */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f5f5f5;
            /* light gray */
        }

        .table-hover tbody tr:hover {
            background-color: #795548;
            /* dark brown */
            color: #ffffff;
            /* white */
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Authenticated User Data (Mobilites)</h2>
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
                    $mobilites = \App\Models\Mobilite::where('user_id', auth()->id())->get();
                @endphp
                @if ($mobilites->count() > 0)
                    @foreach ($mobilites as $mobilite)
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
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
