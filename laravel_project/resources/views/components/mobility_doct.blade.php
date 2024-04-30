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
            margin: 0;
            padding: 0;
            background-image: url("{{ asset('images/background.jpg') }}");
            background-size: cover;
            background-position: center;
            /* background-color: #f8f9fa; */
        }

        form {
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #8B4513;
            border-radius: 10px;
            background-color: #f8f9fa;
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
    <form action="{{ route('form.doct.submit') }}" method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="nomc" id="nom" value="{{ auth()->user()->nom }}"
                required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" name="prenomc" id="prenom"
                value="{{ auth()->user()->prenom }}" required>
        </div>
        <div class="form-group">
            <label for="structure">Structure de recherche :</label>
            <input type="text" class="form-control" name="structurec" id="structure" value="{{ old('structurec') }}"
                required>
        </div>
        <div class="form-group">
            <label for="etablissement">Établissement :</label>
            <input type="text" class="form-control" name="etablissementc" id="etablissement"
                value="{{ old('etablissementc') }}" placeholder="Établissement 1, Établissement 2, ..." required>
        </div>
        <div class="form-group">
            <label for="ced">CED :</label>
            <input type="text" class="form-control" name="cedc" id="ced" value="{{ auth()->user()->ced }}"
                required>
        </div>
        <div class="form-group">
            <label for="formation">Formation doctorale :</label>
            <input type="text" class="form-control" name="formationc" id="formation" value="{{ old('formationc') }}"
                required>
        </div>
        <div class="form-group">
            <label for="email">E-mail :</label>
            <input type="email" class="form-control" name="emailc" id="email"
                value="{{ auth()->user()->email }}" required>
        </div>

        <h3>Information concernant la thèse :</h3>
        <hr><br>
        <div class="form-group">
            <label for="titre_these">Titre de la thèse :</label>
            <input type="text" class="form-control" name="titre_thesec" id="titre_these"
                value="{{ old('titre_thesec') }}" required>
        </div>
        <div class="form-group">
            <label for="nom_encadrant">Nom de l'encadrant :</label>
            <input type="text" class="form-control" name="nom_encadrantc" id="nom_encadrant"
                value="{{ old('nom_encadrantc') }}" required>
        </div>
        <div class="form-group">
            <label for="prenom_encadrant">Prénom de l'encadrant :</label>
            <input type="text" class="form-control" name="prenom_encadrantc" id="prenom_encadrant"
                value="{{ old('prenom_encadrantc') }}" required>
        </div>
        <div class="form-group">
            <label for="date_inscription">Date de la 1ère inscription en thèse :</label>
            <input type="date" class="form-control" name="date_inscriptionc" id="date_inscription"
                value="{{ old('date_inscriptionc') }}" required>
        </div>

        <h3>Description du sujet de thèse</h3>
        <textarea class="form-control" name="description_sujetc" id="description_sujet" cols="30" rows="6"
            required>{{ old('description_sujetc') }}</textarea><br>
        <h3>Description des travaux de recherche et résultats attendus durant la mobilité</h3>
        <textarea class="form-control" name="description_travauxc" id="description_travaux" cols="30" rows="6"
            required>{{ old('description_travauxc') }}</textarea>
        </div>
        <div class="form-group">
            <h3>Pertinence et impact</h3>
            <textarea class="form-control" name="pertinence_impactc" id="pertinence_impact" cols="30" rows="6"
                required>{{ old('pertinence_impactc') }}</textarea>

            <h3>Structure d'accueil pour la mobilité</h3>
            <div class="form-group">
                <label for="universite_accueil">Université d'accueil :</label>
                <input type="text" class="form-control" name="universite_accueil" id="universite_accueil"
                    value="{{ old('universite_accueil') }}" required>
            </div>
            <div class="form-group">
                <label for="ville_accueil">Ville :</label>
                <input type="text" class="form-control" name="ville_accueil" id="ville_accueil"
                    value="{{ old('ville_accueil') }}" required>
            </div>
            <div class="form-group">
                <label for="pays_accueil">Pays :</label>
                <input type="text" class="form-control" name="pays_accueil" id="pays_accueil"
                    value="{{ old('pays_accueil') }}" required>
            </div>
            <div class="form-group">
                <label for="date_debut_sejour">Date de séjour :</label><br>
                <label for="date_debut_sejour">Du :</label>
                <input type="date" class="form-control" name="date_debut_sejour" id="date_debut_sejour"
                    value="{{ old('date_debut_sejour') }}" required>
            </div>
            <div class="form-group">
                <label for="date_fin_sejour">Au :</label>
                <input type="date" class="form-control" name="date_fin_sejour" id="date_fin_sejour"
                    value="{{ old('date_fin_sejour') }}" required>
            </div>
            <div class="form-group">
                <label for="cadre_mob">Cadre de la mobilité :</label>
                <select class="form-control" name="cadre_mob" id="cadre_mob" required>
                    <option value="Conventionnelle">Conventionnelle</option>
                    <option value="Co direction">Co-direction</option>
                    <option value="Autres">Autres</option>
                </select>
            </div>
            <div class="form-group">
                <label for="justificatif">Infos supplémentaire</label>
                <input type="text" class="form-control" name="justificatif" id="justificatif"
                    value="{{ old('justificatif') }}">
            </div>

            <div class="form-group">
                <label for="invitation">Document</label>
                <input type="file" class="form-control-file" name="invitation" id="invitation">
            </div>

            <input type="submit" class="btn btn-primary" value="Ajouter la condidature">

    </form>
</body>

</html>
