<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr_FR">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/style.css"/>
        <meta name="viewport" content="width=device-width, initail-scale=1.0"/>
        <link rel="shortcut icon" href="src/Images/Vegetables/svg/Fig.svg">
        <title>CodeFig - Accueil</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>

<!-- #region NavBar -->

        <div class="nav-bar">
            <div class="nav-logo">
                <img src="src/Images/Vegetables/svg/Fig.svg"/>
                <h1>CodeFig</h1>
            </div>
            <div class="nav-links" id="mobileMenu">
                
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <?php 
                                //Connexion/Inscription 
                                include 'php/database.php';//Inclusion de la bdd
                                global $db;
            
                                if(isset($_SESSION['MailUtil']) and $_SESSION['PasswordUtil']) //Si la Session pseudo et mdp n'est pas nul alors CONNEXION
                                {          
                                    echo'<li><a href="profile.php">Profil</a></li>';
                                    echo'<li><a href="php/disconnect.php">Deconnexion</a></li>';   
                                }
                                else {
                                    echo'<li><a href="php/account.php">Compte</a></li>';     
                                }
                            ?>
                </ul>
                
            </div>
            <img src="src/Images/Graphique/menu-icon.png" class="menu-icon" onclick="showMenu()"/>
        </div>
        
<!-- #endregion -->
<!-- #region Landing Page -->

        <div class="hero">
            <h1>Apprend à développer<br/>par toi-même avec CodeFig.</h1>
            <div class="button-index">
                <p><a href="#categories">Click <b>on</b> Me</a></p>
            </div>
        </div>

<!-- #endregion -->
<!-- #region Featured Fruits -->

        <div class="categories" id="categories">
            <div class="small-container">
                <h2 class="title">Featured Fruits</h2>
                <div class="row">
                    <?php
                    
                    $req = $db->query('SELECT NomProg, ImgProg FROM programme');
                    while($donnees = $req->fetch()) {
                        echo '<div class="col-3">';
                        echo '<img class="x" src="src/Images/Vegetables/svg/'.$donnees['ImgProg'].'"/>';
                        echo '<h4>'.$donnees["NomProg"].'</h4>';
                        echo '<br/>';
                        echo '<p><em>Le programme <b>'.$donnees["NomProg"].'</b> est actuellement <b>indisponible</b>. Merci de revenir plus tard afin de pouvoir le tester.</em></p>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

<!-- #endregion -->

        <script>
            
            function showMenu() {
                var toggle = document.getElementById("mobileMenu");

                if (toggle.style.height == "0px") {
                    toggle.style.height = "200px";
                } else {
                    toggle.style.height = "0px";
                }
            }

        </script>
    </body>
</html>