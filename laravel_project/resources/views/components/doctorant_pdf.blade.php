<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mobilité document</title>
    <link rel="stylesheet" href="{{ public_path('bootstrap/css/bootstrap.min.css') }}">
    <style>
        /* Bootstrap CSS */
        .container {
            border: 2px solid black;
            border-radius: 5px;
            overflow: hidden;
            height: 100px;
            /* Set the height of the container */
        }

        .container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Adjust as needed */
        }

        .thick-text {
            font-weight: bold;
            font-size: 18px;
        }

        .center-column {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            padding: 10px;
            /* Add some padding */
        }

        /* Centering the divs */
        .centered-divs {
            text-align: center;
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .container_sub {
            position: absolute;
            top: 33%;
        }

        /* Style for ps */
        p {
            font-weight: 400;
            margin-bottom: 2px;
            /* Add space after each p */
            display: block;
        }

        /* Separate sections */
        .form-section {
            margin-bottom: 20px;
        }

        .page-break {
            page-break-after: always;
        }

        /* Style for signature tables */
        .signature-table {
            width: 100%;
            border: 2px solid black;
            border-collapse: collapse;
        }

        .signature-table th,
        .signature-table td {
            border: 2px solid black;
            padding: 5px;
            text-align: center;
        }

        .signature-table td:nth-child(2) {
            padding-top: 30px;
            /* Adjust the padding as needed */
            padding-bottom: 30px;
            /* Adjust the padding as needed */
            width: 33%;
        }
    </style>
</head>

<body>
    <div class="container border border-dark">
        <div class="row align-items-center h-100">
            <div class="col border-dark border-right h-100">
                <img src="{{ asset('images/cadi_ayyad.jpeg') }}" alt="Left Image"> <!-- Change asset path -->
            </div>
            <div class="col border-dark border-left border-right h-100 center-column">
                <div class="thick-text text-center">UNIVERSITE CADI AYYAD</div>
                <div class="text-center">PRESIDENCE</div>
            </div>
            <div class="col border-dark border-left h-100">
                <img src="{{ asset('images/marrakech_safi.jpg') }}" alt="Right Image"> <!-- Change asset path -->
            </div>
        </div>
    </div>

    <div class="centered-divs">
        <div>Appel à Candidature pour</div>
        <div>Les Bourses et Les Mobilités de Recherche</div>
        <div>(Dans le cadre du Fond Régional de l'Excellence)</div>
        <div>Avril 2023</div><br>
        <div class="h5">Fiche de candidature</div>
        <div class="h5">Bourses d'Excellence pour la Mobilite des doctorants</div>
    </div>

    <div class="container_sub">
        <div class="form-section">
            <h5>Identification du candidat</h5>
            <hr>
            <div>
                <p for="nom">Nom : {{ $condidat->nom }}</p>
                <p for="prenom">Prénom :{{ $condidat->prenom }}</p>
                <p for="structure">Structure de recherche :{{ $condidat->structure_de_recherche }}</p>
                <p for="etablissement">Établissement :{{ $condidat->etablissement }}</p>
                <p for="ced">CED :{{ $condidat->ced }}</p>
                <p for="formation">Formation doctorale :{{ $condidat->fd }}</p>
                <p for="email">E-mail :{{ $condidat->email }}</p>
            </div>
        </div>

        <!-- Other sections go here -->
        <div class="form-section">
            <h5>Information concernant la thèse</h5>
            <hr>
            <div>
                <p for="titre_these">Titre de la thèse :{{ $these->titre }}</p>
                <p for="nom_encadrant">Nom et prénom de l'encadrant :{{ $these->nom_encadrant }}
                    {{ $these->prenom_encadrant }}</p>
                <p for="date_inscription">Date de la 1ère inscription en thèse :{{ $these->date_inscription }}</p>
            </div>
        </div>

        <div class="form-section">
            <h6>Description du sujet de thèse (deux pages max)</h6>
            <div>
                <p for="description_sujet">Description du sujet de thèse :{{ $these->description_sujet }}</p>
            </div>
        </div>

        <div class="form-section mt-4">
            <h6>Description des travaux de recherche et résultats attendus durant la mobilité</h6>
            <div>
                <p for="description_travaux">Description des travaux de recherche et résultats attendus durant la
                    mobilité : {{ $these->description_traveaux }}
                </p>
            </div>
            <h5>Production Scientifique</h5>
            <hr>
            <h6>Publication dans des revues :</h6>

            <p for="auteurs_publication">Les noms des auteurs :{{ $production->noms_auteurs }}</p>

        </div>
    </div>

    <!-- Insert page break before this section -->

    <div class="page-break"></div>

    <div class="form-section">
        <div>
            <p for="titre_article">Titre de l'article :{{ $production->titre_article }}</p>
            <p for="titre_revue">Titre de la revue :{{ $production->titre_revue }}</p>
            <p for="volume">Volume :{{ $production->volume }}</p>
            <p for="numero">Numéro :{{ $production->numero }}</p>
            <p for="date_publication">Date de publication :{{ $production->date_publication }}</p>
            <p for="numeros_page">Numéros de page :{{ $production->numero_page }}</p>
        </div>

        <h6 class="mt-3">Communication dans des manifestations scientifiques :</h6>
        <div>
            <p for="titre_communication">Titre de la communication :{{ $communication->titre }}</p>
            <p for="intitule_manifestation">L'intitulé de la manifestation :{{ $communication->intitulee }}</p>
            <p for="lieu_manifestation">Lieu :{{ $communication->lieu }}</p>
            <p for="date_manifestation">Date :{{ $communication->date }}</p>
        </div>
    </div>

    <!-- Other sections go here -->
    <div class="form-section">
        <h5>Pertinence et impact</h5>
        <div>
            <p for="pertinence_impact">Pertinence et impact :{{ $these->pertience_et_Impact }}</p>
        </div>
    </div>

    <div class="form-section">
        <h5>Structure d'accueil pour la mobilité</h5>
        <hr>
        <div class="">
            <p for="universite_accueil">Université d'accueil :{{ $mobilite->universite_dacceuil }}</p>
            <p for="ville_accueil">Ville :{{ $mobilite->ville }}</p>
            <p for="pays_accueil">Pays :{{ $mobilite->pays }}</p>
            <p for="date_debut_sejour">Date de séjour (Du) :{{ $mobilite->date_debut }}</p>
            <p for="date_fin_sejour">Date de séjour (Au) :{{ $mobilite->date_fin }}</p>
            <p for="cadre_mob">Cadre de la mobilité :{{ $mobilite->carte_mobilite }}</p>
            <p for="justificatif">Infos supplémentaire :{{ $mobilite->joindre_justicatif }}</p>
        </div>
    </div>
    <!-- Signature section -->
    <div class="form-section">
        <h5>Dates et Signatures</h5>
        <hr>
        <table class="signature-table">
            <thead>
                <tr>
                    <th>Chef d'etablissement</th>
                    <th>Directeur du CED</th>
                    <th>Directeur de la Structure de Recherche</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table><br>

        <table class="signature-table">
            <thead>
                <tr>
                    <th>Encadrent</th>
                    <th>Condidat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
