<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/doctorantCss/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        /* Optional: Style error messages */

        .error-message {
            color: #721c24;
            /* Dark red */
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>

<body>
    @include('partials.header')
    @if (isset($email) && $email != '')
        <h1>Entrez votre adresse email</h1>
        <form action="{{ route('sub.doctorant') }}" method="POST" onsubmit="return validateEmail()">
            @csrf

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $email }}">
            <span class="error-message" id="emailError"></span>
            <button type="submit" class="btn btn-secondary" name="submit" value="magic-link">
                Se connecter
            </button>

        </form>
        @if ($errors->has('email'))
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>
        @endif
    @else
        <button type="button" onclick="authenticateWithGoogle()" class="login-with-google-btn">Continue avec
            Google</button>

        @if ($errors->has('email'))
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>
        @elseif ($message = session('message'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

    @endif
    <script>
        function authenticateWithGoogle() {
            window.location.href = "{{ route('google_auth') }}";
        }

        // function validateEmail() {
        //     var emailInput = document.getElementById('email').value;
        //     var emailError = document.getElementById('emailError');
        //     var emailRegex = /^[a-zA-Z0-9._-]+@uca\.ac\.ma$/;

        //     if (!emailRegex.test(emailInput)) {
        //         emailError.textContent = "Email invalide. Utilisez une adresse e-mail @uca.ac.ma";
        //         return false;
        //     } else {
        //         emailError.textContent = "";
        //         return true;
        //     }
        // }
    </script>
</body>

</html>
