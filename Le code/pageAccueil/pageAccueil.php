<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univers-toi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="pageAccueil.css">
</head>

<body>

    <?php require 'nav.php'?>

    <div class="container mt-5" id="vaisseau">
        <img src="photo/crewdragon1.jpg" class="img-fluid mx-auto d-block rounded" alt="Un vaisseau au-dessus de la Terre">
    </div>

    <h1 class="container text-center mt-5">Le premier voyage</h1>

    <div class="container mt-5 text-align-center">
        <p class="text-center">Bonjour, chères curieuses et chers curieux.<br>
            Si vous êtes entré(e)s ici, c'est que vous avez soif de savoir !
            Avouez-le !<br>
            D'innombrables articles vont se présenter à vous sur votre parcours, ainsi que des épreuves qui vont vous permettre<br>
            de mesurer vos connaissances. Pour cela, il faudra que vous vous inscriviez sur le site.
            N'hésitez pas à le parcourir de fond en comble : il regorge d'informations croustillantes.<br>
            Êtes vous prêts pour ce voyage au travers du système solaire, et au-delà ?<br>
            Attachez vos ceintures !
        </p>


        <h2>Un saut dans l'espace</h2>
    
    <div class="container mt-5 text-align-center">
        <p class="text-center">Nous allons faire un bond d'environ 400 kilomètres d'altitude, viens !</p>
        <p class="text-center">Ca va ? Tu n'as pas trop été secoué ? Continuons alors !</p>
        <p class="text-center">Vois-tu la fine couche d'atmosphère de la Terre ?<br>
            Clique sur l'image pour en apprendre plus. </p>
    </div>

        <div class="container-fluid">
            <div class="text-center">
                <a class="" href="#"><img src="./photo/terre1.jpg" alt="Une partie de la Terre vu de l'espace" /></a>
            </div>
        </div>
            


        <?php require '../pageAccueil/footer.php'?>
</body>

</html>