<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .home-link {
            background-color: brown;
            color: white;
            border: none;
            padding: 10px 15px;
            /* Adjusted padding */
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            margin: 5px;
            display: inline-block;
            /* Set to inline-block */
            text-align: center;
            /* Center text */
            width: 120px;
            /* Fixed width */
        }

        .home-link:hover {
            background-color: #8b4513;
        }

        .button-icon {
            font-size: 20px;
            /* Increased font size */
            margin-right: 5px;
        }

        .container {
            border: 2px solid black;
            border-radius: 5px;
            overflow: hidden;
            height: 100px;
            /* Set the height of the container */
            display: flex;
            align-items: center;
            /* Center items vertically */
        }

        .container img {
            width: auto;
            height: 100%;
            object-fit: contain;
            /* Ensure the image fits within the container */
        }

        .thick-text {
            font-weight: bold;
            font-size: 18px;
        }

        .center-column {
            flex-grow: 1;
            /* Expand to fill available space */
            text-align: center;
            /* Center text */
            padding: 0 20px;
            /* Add padding to center column */
            width: 40%;
            /* Set the width of the center column */
        }

        .center-column>div {
            margin-bottom: 10px;
            /* Add spacing between text */
        }

        .col {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            height: 100%;
            width: 30%;
            /* Set the width of the side columns */
        }

        @media (max-width: 768px) {
            .container {
                height: auto;
                /* Adjust height for smaller screens */
                flex-direction: column;
                /* Stack columns vertically */
            }

            .col {
                width: 100%;
                /* Set full width for smaller screens */
                flex: none;
                /* Disable flex grow for smaller screens */
            }

            .center-column {
                width: 100%;
                /* Set full width for smaller screens */
            }
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        a.download-link,
        button {
            background-color: brown;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            margin: 5px;
            display: flex;
            align-items: center;
        }

        a.download-link:hover,
        button:hover {
            background-color: #8b4513;
        }

        a.download-link::after {
            content: "\1F4E5";
            /* Unicode for download icon */
            font-size: 16px;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <div class="container border border-dark">
        <div class="col border-dark border-right">
            <img src="{{ asset('images/cadi_ayyad.jpeg') }}" alt="Left Image">
        </div>
        <div class="center-column">
            <div class="thick-text">UNIVERSITE CADI AYYAD</div>
            <div>PRESIDENCE</div>
        </div>
        <div class="col border-dark border-left">
            <img src="{{ asset('images/marrakech_safi.jpg') }}" alt="Right Image">
        </div>
    </div>

    <a href="/dashboard/view/welcome" class="home-link">
        <span class="button-icon">&#x1F3E0;</span>
        Accueil
    </a>
    <div class="button-container">
        <a href="{{ route('generatePDF') }}" class="download-link" target="_blank">télécharger la candidature</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>

</html>
