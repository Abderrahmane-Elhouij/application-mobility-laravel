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
        .form-section {
            margin-bottom: 20px;
        }

        .form-section p {
            margin-bottom: 2px;
            display: block;
        }

        .form-section p strong {
            font-weight: bold;
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
            padding-bottom: 30px;
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
                <p><strong>Nom :</strong> {{ $condidat->nom }}</p>
                <p><strong>Prénom :</strong> {{ $condidat->prenom }}</p>
                <p><strong>Structure de recherche :</strong> {{ $condidat->structure_de_recherche }}</p>
                <p><strong>Établissement :</strong> {{ $condidat->etablissement }}</p>
                <p><strong>E-mail :</strong> {{ $condidat->email }}</p>
                <p><strong>Telephone :</strong> {{ $condidat->telephone }}</p>
            </div>
        </div>

        <div class="form-section mt-4">
            <h6>Description des travaux de recherche et résultats attendus durant la mobilité</h6>
            <div>
                <p><strong>Description des travaux de recherche et résultats attendus durant la
                        mobilité :</strong> {{ $condidat->description_traveaux }}
                </p>
            </div>
        </div>
        <div class="form-section">
            <h5>Pertinence et impact</h5>
            <div>
                <p><strong>Pertinence et impact :</strong> {{ $condidat->pertinence_impact }}</p>
            </div>
        </div>
    </div>



    <div class="page-break"></div>

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

    <div class="form-section">
        <h5>Structure d'accueil pour la mobilité</h5>
        <hr>
        <div class="">
            <p><strong>Université d'accueil :</strong> {{ $mobilite->universite_dacceuil }}</p>
            <p><strong>Ville :</strong> {{ $mobilite->ville }}</p>
            <p><strong>Pays :</strong> {{ $mobilite->pays }}</p>
            <p><strong>Date de séjour (Du) :</strong> {{ $mobilite->date_debut }}</p>
            <p><strong>Date de séjour (Au) :</strong> {{ $mobilite->date_fin }}</p>
            <p><strong>Cadre de la mobilité :</strong> {{ $mobilite->carte_mobilite }}</p>
            <p><strong>Infos supplémentaire :</strong> {{ $mobilite->joindre_justicatif }}</p>
        </div>
    </div>

    <div class="form-section">
        <h5>Dates et Signatures</h5>
        <hr>
        <table class="signature-table">
            <thead>
                <tr>
                    <th>Chef d'etablissement</th>
                    <th>Directeur de la Structure de Recherche</th>
                    <th>Encadrant</th>
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
    </div>

</body>

</html>
