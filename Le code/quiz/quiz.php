<?php
session_start();

include("../Pageconnec/Cnxserver.php");

//Recupération des données json
$json = file_get_contents('./quiz.json');
$obj = json_decode($json, true);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>


<body>

    
    <?php
    //print_r($_SESSION);
    echo '<div class="container-flex ml-3 mt-3 "><a class="btn btn-success" href="../pageAccueil/profile.php" role="button">Mon Profil</a></div>';
    echo '<h1 class="text-center mt-3 ">Le questionnaire</h1>'; 
    echo '<form method="POST" class="m-5">';

    //Affichage des questions
    foreach ($obj['questions'] as $i=>$question)
    {
        //print_r($question);
        $num = $i+1;
        echo "
            <div class='container'>
                <p class='text-center'> Question ".$num." : " .$question['question']. "</p>
            </div>";
        
            /* Affichage des : propositions de réponses, des true ou false attibués à chaque réponse, 
                        de l'identification de chaque id(radio)/for(label) + name(radio) */  
        foreach ($question['reponses'] as $reponse) 
        {
              echo '
                <div class="form-check container text-center">
                    <input class="form-check-input text-center" type="radio" required name="'.$reponse['name'].'" id="'.$reponse['id'].'" value="' .$reponse['rep']. '">
                    <label class="form-check-label" for="'.$reponse['id'].'">
                    <p class="text-center"> Réponse  : ' .$reponse['choix']. '</p>
                    </label>
                </div>'; 
                
        }
        
    }
    echo '<div class="container text-center mt-3"><button type="submit" class="btn btn-primary">Validez vos réponses</button></div>';
    
    echo '</form>';
    //echo count($_POST);
    
            if(isset($_POST) && count($_POST) < 3)
            {
                echo '<div class="container text-center">
                        <h4 class="text-center">Vous devez répondre aux 3 questions :)</h4>
                    </div>'; 
            }
            if(isset($_POST) && count($_POST) == 3){

                echo '<div class="container text-center">
                        <h4 class="text-center">Vous avez répondu aux 3 questions</h4>
                    </div>'; 

            }
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

     

        $compte=1;
        $jeton=0;
        foreach($_POST as $rep)
        {
            
            if($rep == true)
            {
                $jeton++;
                echo '<div class="container text-center">
                        <h4 class="alert alert-success ml-3 mb-5">Votre réponse à la question '.$compte.' est correcte </h4>
                    </div>';
                
                
            
            }
            else
            {
                echo '<div class="container alert alert-danger text-center">
                        <h4 class="text-center">Votre réponse à la question '.$compte.' est fausse. </h4>
                        <h4 class="text-center">La bonne réponse est : '.$obj['questions'][$compte-1]['correct'].' </h4>
                    </div>';  
            }
            $compte++;
        }
        
        
        //requete sql pour crediter l'utilsateur du nombre de point par bonne reponse 
                
        if(isset($_SESSION['id']))
        {
        
            $jetonwin = $_SESSION['jeton'] + $jeton;
            $_SESSION['jeton'] = $jetonwin;
            $id = $_SESSION['id'];

            $insertsql = "UPDATE users SET jeton = jeton + $jeton WHERE id = $id";
            $result = $connexion->query($insertsql);
        
        }
        if($result)
        {
            if($jeton > 1){
                echo "<h4 class='text-center'>Votre compte a été bonifié de ".$jeton." points.</h4>";
            }
            else
            {
                echo "<h4 class='text-center'>Votre compte a été bonifié de ".$jeton." point.</h4>";  
            } 
        }
        
    }



    ?>