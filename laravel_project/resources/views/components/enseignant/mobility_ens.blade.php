<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <title>Formulaire de candidature</title>
    <style>
        body {
            background-color: #fff;
            color: #333;
        }

        form {
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #8B4513;
            border-radius: 10px;
            background-color: #fff;
            margin-left: 18%;
        }

        h3,
        h4 {
            color: #8B4513;
        }

        hr {
            border-color: #8B4513;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        input[type="submit"] {
            background-color: #8B4513;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #A0522D;
        }

        ul {
            color: red;
        }
    </style>
</head>

<body>
    @include('partials.header')
    <form action="{{ route('form.ens.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3>Identification du candidat</h3>
        <hr><br>
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom" value="{{ auth()->user()->nom }}">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" name="prenom" id="prenom"
                value="{{ auth()->user()->prenom }}">
        </div>
        <div class="form-group">
            <label for="structure">Structure de recherche :</label>
            <input type="text" class="form-control" name="structure_de_recherche" id="structure" value="{{ old('structurec') }}">
        </div>
        <div class="form-group">
            <label for="etablissement">Établissement :</label>
            <input type="text" class="form-control" name="etablissement" id="etablissement"
                value="{{ old('etablissementc') }}" placeholder="Établissement 1, Établissement 2, ...">
        </div>
        <div class="form-group">
            <label for="email">E-mail :</label>
            <input type="email" class="form-control" name="email" id="email"
                value="{{ auth()->user()->email }}">
        </div>
        <div class="form-group">
            <label for="email">Telephone :</label>
            <input type="text" class="form-control" name="telephone" id="telephone"
                value="{{ old('telephone') }}">
        </div>

        <h3>Description des travaux de recherche et résultats attendus durant la mobilité</h3>
        <textarea class="form-control" name="description_traveaux" id="description_travaux" cols="30" rows="6">{{ old('description_travauxc') }}</textarea>

        <h3>Pertinence et impact</h3>
        <textarea class="form-control" name="pertinence_impact" id="pertinence_impact" cols="30" rows="6">{{ old('pertinence_impactc') }}</textarea>

        <h3>Structure d'accueil pour la mobilité</h3>
        <div class="form-group">
            <label for="universite_accueil">Université d'accueil :</label>
            <input type="text" class="form-control" name="universite_dacceuil" id="universite_accueil"
                value="{{ old('universite_dacceuil') }}">
        </div>
        <div class="form-group">
            <label for="ville_accueil">Ville :</label>
            <input type="text" class="form-control" name="ville" id="ville_accueil"
                value="{{ old('ville_accueil') }}">
        </div>
        <div class="form-group">
            <label for="pays_accueil">Pays :</label>
            <input type="text" class="form-control" name="pays" id="pays_accueil"
                value="{{ old('pays_accueil') }}">
        </div>
        <div class="form-group">
            <label for="date_debut_sejour">Date de séjour :</label><br>
            <label for="date_debut_sejour">Du :</label>
            <input type="date" class="form-control" name="date_debut" id="date_debut_sejour"
                value="{{ old('date_debut_sejour') }}">
        </div>
        <div class="form-group">
            <label for="date_fin_sejour">Au :</label>
            <input type="date" class="form-control" name="date_fin" id="date_fin_sejour"
                value="{{ old('date_fin_sejour') }}">
        </div>
        <div class="form-group">
            <label for="cadre_mob">Cadre de la mobilité :</label>
            <select class="form-control" name="carte_mobilite" id="cadre_mob">
                <option value="Conventionnelle">Conventionnelle</option>
                <option value="Co direction">Co-direction</option>
                <option value="Autres">Autres</option>
            </select>
        </div>
        <div class="form-group">
            <label for="justificatif">Infos supplémentaire</label>
            <input type="text" class="form-control" name="joindre_justicatif" id="justificatif"
                value="{{ old('justificatif') }}">
        </div>

        <div class="form-group">
            <label for="invitation">Document</label>
            <input type="file" class="form-control-file" name="document" id="invitation">
        </div>

        <input type="submit" class="btn btn-primary" value="Ajouter la condidature">

    </form>
</body>

</html>
