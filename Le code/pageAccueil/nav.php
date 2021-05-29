    <body>
    <!-- TODO Faire le footer -->
    <!--Affichage barre de navigation-->
    <nav class="navbar navbar-expand-md" style="background-color: #e3f2fd;">

        <a class="navbar-brand" href="#"><img src="photo/logo.jpg" alt="logo" /></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
            <p class="mr-1 mb-0">UNIVERS TOI</p>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link mt-2 ml-5" href="../pageAccueil/pageAccueil.php">Accueil <span class="sr-only">(current)</span></a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  mt-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Articles
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../pageArticles/syssol.php">Le système solaire</a>
                        <a class="dropdown-item" href="../pageArticles/voisin.php">Le voisinage</a>
                        <a class="dropdown-item" href="../pageArticles/galaxies.php">Les galaxies</a>
                    </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link  mt-2" href="galerie.php">Galerie</a>
                </li>
                <?php 
                if(isset($_SESSION['mail'])){

                    
                  echo  ' <li class="nav-item">
                            <a class="nav-link  mt-2" href="../pageAccueil/profile.php">Mon profil</a>
                        </li>';

                }
                ?>
                
                <li class="nav-item">
                    <?php
                    if (!isset($_SESSION['prenom'])) 
                    {
                        echo '<a class="nav-link ml-2 mt-2" href="../Pageconnec/formlogin.html">Connexion</a>';
                        //print_r($_SESSION['prenom']);
                    } 
                    else 
                    {
                        echo '
                            <li class="nav-itm ml-4 mt-3">
                                <p>Bonjour ' . $_SESSION['prenom'] . '</p>
                            </li>
                            <li class="nav-item ml-4 mt-0"> 
                                <a class="nav-link mt-2" href="../Pageconnec/logout.php">Déconnexion</a> 
                            </li>
                            ';
                    }

                    ?>
                </li>
            </ul>

        </div>
        
    </nav>
