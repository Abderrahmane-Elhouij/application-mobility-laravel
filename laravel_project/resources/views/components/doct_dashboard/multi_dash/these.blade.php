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
                    $theses = \App\Models\These::where('user_id', auth()->id())->get();
                @endphp
                @if ($theses->count() > 0)
                    @foreach ($theses as $these)
                        <tr>
                            <td>{{ $these->id }}</td>
                            <td>{{ $these->titre }}</td>
                            <td>{{ $these->nom_encadrant }}</td>
                            <td>{{ $these->prenom_encadrant }}</td>
                            <td>{{ $these->date_inscription }}</td>
                            <td>{{ $these->description_sujet }}</td>
                            <td>{{ $these->description_traveaux }}</td>
                            <td>{{ $these->pertience_et_Impact }}</td>
                            <td>{{ $these->created_at->format('Y-m-d H:i:s') }}</td> <!-- Format the created_at date -->
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No data available</td> <!-- colspan increased to 8 for the new column -->
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
