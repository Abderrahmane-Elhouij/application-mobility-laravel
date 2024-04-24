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
        <h2 class="mb-4">Authenticated User Data (Communications Manifestations)</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th> <!-- New column for ID -->
                    <th scope="col">Titre</th>
                    <th scope="col">Intitulée</th>
                    <th scope="col">Lieu</th>
                    <th scope="col">Date</th>
                    <th scope="col">Créé à</th> <!-- New column for created_at -->
                </tr>
            </thead>
            <tbody>
                @php
                    $communications = \App\Models\Communication_manifestation::where('user_id', auth()->id())->get();
                @endphp
                @if ($communications->count() > 0)
                    @foreach ($communications as $communication)
                        <tr>
                            <td>{{ $communication->id }}</td> <!-- ID column -->
                            <td>{{ $communication->titre }}</td>
                            <td>{{ $communication->intitulee }}</td>
                            <td>{{ $communication->lieu }}</td>
                            <td>{{ $communication->date }}</td>
                            <td>{{ $communication->created_at->format('Y-m-d H:i:s') }}</td>
                            <!-- Format the created_at date -->
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No data available</td> <!-- colspan increased to 6 for the new columns -->
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
