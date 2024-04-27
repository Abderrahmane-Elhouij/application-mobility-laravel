<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Website</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            /* white */
        }

        .container {
            margin-top: 100px;
        }

        .btn-brown {
            background-color: #8B4513;
            /* brown */
            border-color: #8B4513;
            /* brown */
            color: #fff;
            /* white */
        }

        .btn-brown:hover {
            background-color: #6a3a11;
            /* darker brown */
            border-color: #6a3a11;
            /* darker brown */
            color: #fff;
            /* white */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Welcome to University</div>
                    <div class="card-body">
                        <form action="{{ route('redirectToSpace') }}">
                            @csrf
                            <div class="form-group">
                                {{ auth()->user()->email }}
                                <button type="submit" class="btn btn-brown btn-block">Continuez vers votre
                                    espace</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
