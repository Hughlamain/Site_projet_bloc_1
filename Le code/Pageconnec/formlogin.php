<?php session_start();?>

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

include("./Cnxserver.php");



    //Vérification si le user existe en base de données au moment du login
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //mail du user et mot de passe envoyés depuis le formulaire
        $prenom = '';
        $mail = $_POST['mail'];
        $password = $_POST['pass_word'];
        //TODO Faire en sorte que le mot de passe soit crypté
        //Il faut pouvoir le rapatrier ici
        /* if(password_verify($password,'????????')){
            echo'Le mot de passe est valide.';
            
        }
        else{
            echo'Le mot de passe est invalide.';
        } */
        $selectsql = "SELECT id, prenom, nom, jeton, email FROM users WHERE email = '$mail' and pass_word = '$password'";
        $result = mysqli_query($connexion, $selectsql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        
    }
        if (isset($row))
        {
            $prenom = $row['prenom'];
            $nom = $row['nom'];
            $mail = $row['email'];
            $id = $row['id'];
            $jeton = $row['jeton'];
            
        }
        
        //Si le $mail correspond bien au $password, le user est dans une colonne de la base de donnée
        if($count == 1)
        
        {
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;
            $_SESSION['mail'] = $mail;
            $_SESSION['id'] = $id;
            $_SESSION['jeton'] = $jeton;
            
            header("location: ../pageAccueil/pageAccueil.php");
              
        }
        
        else
        {
           
            $error = '<h1 class="text-center">Votre mail ou votre mot de passe est incorrect</h1>';
            echo $error."<br>";
        ?>
            <div class ="row justify-content-center mt-4 mr-5">
                <a href ="./formlogin.html" class="btn btn-primary ml-5">Connectez-vous</a> 
            </div>
            <div class ="row justify-content-center mt-4 mr-5">
                <a href ="./formcreatelogin.html" class="btn btn-danger ml-5">Sinon créez un compte</a>
            </div> 
<?php   } ?>

</body>
</html>