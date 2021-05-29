<?php
 
        
 
        //Connexion à la base de donnée
        $connexion = mysqli_connect( 'localhost', 'root', '', 'registration', '3306');
        
        if ($connexion === false) {
                die ("La connexion à la base de données a échoué". mysqli_error($connexion));
        }

?>