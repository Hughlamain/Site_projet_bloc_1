<?php session_start(); 
include("./Cnxserver.php");?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'inscription</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
</head>

<?php
        
        
        //Création d'un utilisateur par le formulaire
        
        if(isset($_POST['mail']) && !empty($_POST['mail']) &&
           isset($_POST['prenom']) && !empty($_POST['prenom']) &&
           isset($_POST['nom']) && !empty($_POST['nom']) &&
           isset($_POST['pass_word']) && !empty($_POST['pass_word'])) 
        {

                
                
                $mail = stripslashes($_POST['mail']);
                $prenom = stripslashes($_POST['prenom']);
                $nom = stripslashes($_POST['nom']);
                $pass_word = trim($_POST['pass_word']);//pas utile 
           
        
                $sql = "INSERT INTO users (prenom, nom, email, pass_word)
                VALUES ('$prenom',
                        '$nom',
                        '$mail',
                        '$pass_word')";

                $result = $connexion->query( $sql );
        }
                if($result)
                {
                        echo "<div class='w-auto h-50'></div>
                        <div class='success mt-5'> 
                        <h3 class='text-center'>Votre compte a bien été créé.</h3>
                        <div class='row justify-content-center mt-4 mr-5'>
                        <a href='./formlogin.html' class='btn btn-primary ml-5'>Connectez-vous</a> 
                        </div>";       
                }       
                else
                {
                        if(mysqli_errno($connexion) == 1062)
                        {
                                echo '<div class="container-flex ml-5 mt-5 mb-5">
                             
                                <div class="container justify-content-center"><h4 class=" mr-5 mt-5 text-center">Ce mail est déjà utilisé.</h4></div>
                                
                                </div>
                                <div class ="container-flex mr-5">
                                        <div class="d-flex justify-content-center"><a href ="./formcreatelogin.html" class="btn btn-danger ml-5">Créez un compte</a></div>
                                        <div class="d-flex justify-content-center ml-5 mt-5"><a class="btn btn-success" href="../pageAccueil/pageAccueil.php" role="button">Accueil</a>
                                </div> ';
                        }
                        else
                        {
                                echo "Erreur de création de l'abonné·e";
                                echo mysqli_error($connexion);
                        /* header("location: ../pageAccueil/pageAccueil.php"); */
                        }
                }       
        
        

        //Fermeture de la connexion de la BDD SQL
        $connexion->close()
        
?>
</html>




    
    







