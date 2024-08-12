<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUIT INDISPONIBLE !</title>
    <link rel="shortcut icon" href="/icons/indisponible.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    {!! $meta !!}
</head>

<body>
    <div class="container">
        <div class="glass-effect">
            <h3>
                <div>
                    <center>
                        <img src="/icons/indisponible.png" height="70" width="70" alt="" srcset="">
                    </center>
                </div>
                <b>
                    PRODUIT INDISPONIBLE !
                </b>
            </h3>
        </div>
    </div>
</body>

</html>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('/icons/desmumtz1.webp');
        background-size: cover;
        background-position: center;
    }

    .glass-effect {
        background-color: rgba(255, 255, 255, 0.5);
        /* Couleur de l'effet glass */
        padding: 20px;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        /* Effet de flou sur le fond */
    }

    h1 {
        color: rgb(0, 0, 0);
        /* Couleur du texte */
        text-align: center;
        font-size: 2rem;
    }
</style>
