<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <style>
        /* Style for the container */
        .container-home {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        /* Style for the button-like anchor tags */
        a.button {
            display: inline-block;
            width: 250px;
            /* Set width */
            height: 30px;
            /* Set height */
            padding: 10px 20px;
            background-color: brown;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            text-align: center;
            /* Center text horizontally */
            line-height: 30px;
            /* Center text vertically */
        }

        /* Style for hover effect */
        a.button:hover {
            background-color: #8b4513;
            /* Darker brown on hover */
        }

        .success-message {
            background-color: #4caf50;
            /* Green */
            color: white;
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    @include('partials.header')

    <div class="container-home">
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('login-doctorant') }}" class="button">Se connecter en tant que doctorant</a><br><br>
        <a href="{{ route('login-doctorant') }}" class="button">Se connecter en tant que enseignant</a>
    </div>

</body>

</html>
