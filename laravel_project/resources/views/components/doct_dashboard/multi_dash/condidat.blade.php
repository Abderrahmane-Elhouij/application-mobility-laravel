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
                    <th scope="col">Structure de recherche</th>
                    <th scope="col">Etablissement</th>
                    <th scope="col">CED</th>
                    <th scope="col">FD</th>
                    <th scope="col">CRÉÉ À</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $condidats = \App\Models\Condidat::where('user_id', auth()->id())->get();
                @endphp
                @if ($condidats->count() > 0)
                    @foreach ($condidats as $condidat)
                        <tr>
                            <td>{{ $condidat->id }}</td>
                            <td>{{ $condidat->structure_de_recherche }}</td>
                            <td>{{ $condidat->etablissement }}</td>
                            <td>{{ $condidat->ced }}</td>
                            <td>{{ $condidat->fd }}</td>
                            <td>{{ $condidat->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
