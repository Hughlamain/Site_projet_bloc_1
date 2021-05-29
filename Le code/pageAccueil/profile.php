<?php
 require '../pageAccueil/header.php'; 
 //print_r($_SESSION);
?>


<body>
    <?php require '../pageAccueil/nav.php'; ?>

    <h1 class="text-center mt-5">Mon profil</h1>

    <div class="container alert alert-primary">
        <div>
            <div>
                <h5>Identité</h5>
            </div>
            <div>
                <p>Nom : <?php echo $_SESSION['nom']?></p>
            </div>
            <div>
                <p>Prénom : <?php echo $_SESSION['prenom']?></p>
            </div>
            <div>
                <p>Mail : <?php echo $_SESSION['mail']?></p>
            </div>
            
        </div>
    </div>
    <div class="container alert alert-primary">
        <div>
            <div>
                <h5>Questionnaire</h5>
                <a class="btn btn-success" href="../quiz/quiz.php" role="button">Questionnaire</a>
            </div>
            <div>
                <p>Votre badge actuel : <?php 
                if($_SESSION['jeton'] < 10)
                {
                    echo'<img id="image" src="photo/level1.jpg" alt="Niveau 1"></p>';
                }
                
                if($_SESSION['jeton'] > 10 && $_SESSION['jeton'] < 20)
                {
                    echo'<img id="image" src="photo/level2.jpg" alt="Niveau 2"></p>';    
                }
                if($_SESSION['jeton'] > 20)
                {
                    echo'<img id="image" src="photo/level3.jpg" alt="Niveau 3"></p>';    
                }

                ?>



            </div>
            <div>
                <p>Total des points gagnés sur les questionnaires: <?php  
                        if($_SESSION['jeton'] < 2)
                        {
                        echo $_SESSION['jeton'].' point';
                        }                                    
                        else
                        {
                        echo $_SESSION['jeton'].' points';
                        }   
                        ?></p>
            </div>
            
            <div>
                <p>Pour obtenir le badge suivant, il manque : <?php $manque = 20 - $_SESSION['jeton'];
                                                                    
                        if($manque < 2)
                        {
                            echo $manque. ' point';
                        }
                        else
                        {
                            echo $manque. ' points';
                        }
                        ?></p>
                        
                        
            </div>

        </div>
    </div>

    <?php require '../pageAccueil/footer.php' ?>
</body>