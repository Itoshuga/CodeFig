<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="../src/Images/Vegetables/svg/Fig.svg">
        <title>CodeFig - Compte</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>

<!-- #region NavBar -->

        <div class="nav-bar">
            <div class="nav-logo">
                <img src="../src/Images/Vegetables/svg/Fig.svg"/>
                <h1>CodeFig</h1>
            </div>
            <div class="nav-links" id="mobileMenu">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="account.php">Account</a></li>
                </ul>
            </div>
            <img src="../src/menu-icon2.png" class="menu-icon" onclick="showMenu()"/>
        </div>
        
<!-- #endregion -->

        <div class="account-page">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img class="fig" src="../src/Images/Vegetables/svg/Fig.svg"/>
                        </div>
                        <div class="col-2">
                            <div class="form-container">
                                <div class="form-btn">
                                    <span onclick="login()">Connexion</span>
                                    <span onclick="register()">Inscription</span>
                                    <hr id="Indicateur">
                                </div>

                                <form id="LoginForm" method="POST">
                                    <input type="text" placeholder="Pseudo" name="LogPseudo"/>
                                    <input type="password" placeholder="Mot de Passe" name="LogPassword"/>
                                    <button type="logsubmit" class="btn" id="FormLogin" name="connexion">Se Connecter</button>
                                    <a href="#">Mot de Passe Oublié</a>
                                </form>
                                <?php
                                if(isset($_POST['connexion'])) {
                                    extract($_POST);

                                    include 'database.php';
                                    global $db;

                                    if(!empty($LogPseudo) && !empty($LogPassword)) {
                                        $q = $db->prepare("SELECT * FROM utilisateur WHERE PseudoUtil = '$LogPseudo'");
                                        $q->execute(['PseudoUtil' => $LogPseudo]);
                                        $result = $q->fetch();

                                        
                                        if($result == true) {                                
                                            //Le compte existe bien 
                                            $hashpassword = $result['PasswordUtil'];
                                        
                                            if(password_verify($LogPassword, $result['PasswordUtil'])) {
                                                session_start();
                                                $_SESSION['MailUtil'] = $result['MailUtil'];
                                                $_SESSION['PasswordUtil'] = $result['PasswordUtil'];
                                                $_SESSION['IdUtil'] = $result['IdUtil'];

                                                header('Location: ../index.php?id='.$_SESSION['IdUtil']);
                                                exit();
                                            } else {
                                                echo '<div class="error">';
                                                echo '<p>Mot de passe Incorrect.</p>';
                                                echo '</div>';
                                            }
                                        } else {
                                            echo '<div class="error">';
                                            echo '<p>' .$LogPseudo. ' n\'existe pas.</p>';
                                            echo '</div>';
                                        }
                                    } else {
                                        echo '<div class="error">';
                                        echo '<p>Champs Incomplets</p>';
                                        echo '</div>';
                                    }
                                }
                                ?>

                                <form id="RegForm" method="POST">
                                    <input type="text" placeholder="Pseudo" name="RegPseudo"/>
                                    <input type="email" placeholder="e-Mail" name="RegMail"/>
                                    <input type="password" placeholder="Mot de Passe" name="RegPassword"/>
                                    <input type="password" placeholder="Mot de Passe" name="RegPasswordType"/>
                                    <button type="submit" class="btn" id="FormRegister" name="inscription">S'Inscrire</button>
                                </form>
                                <?php
                                    // Extraction du formulaire d'inscription avce la méthode $_POST
                                    if(isset($_POST['inscription'])){
                                        
                                        extract($_POST);
                                
                                        //Cryptage du mot de passe en hashpass
                                        if(!empty($RegPassword) && !empty($RegPasswordType) && !empty($RegMail)) {
                                            if($RegPassword == $RegPasswordType) {
                                                $options = [
                                                    'cost' => 12,
                                                ];
                                        
                                                $hashpass = password_hash($RegPassword, PASSWORD_BCRYPT, $options);
                                        
                                                //Liaison à laBase de Donnée
                                                include 'database.php';
                                                global $db;
                                        
                                                //Création de la Requète
                                                $c = $db->prepare("SELECT MailUtil FROM utilisateur WHERE MailUtil= '$RegMail'");
                                                $c->execute(['MailUtil' => $RegMail]);
                                                $result = $c->rowCount();
                                        
                                                if($result == 0) {
                                                    $q = $db->prepare("INSERT INTO utilisateur(PseudoUtil, MailUtil, PasswordUtil) VALUES('$RegPseudo','$RegMail','$hashpass')");
                                                    $q->execute([
                                                        'MailUtil' => $RegMail,
                                                        'PasswordUtil' => $hashpass
                                                    ]);

                                                    echo '<div class="error">';
                                                    echo '<p>Compte Créé.</p>';
                                                    echo '</div>';

                                                } else {
                                                    echo '<div class="error">';
                                                    echo '<p>Email déjà utilisé.</p>';
                                                    echo '</div>';
                                                }
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            
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

            <script>

                var LoginForm = document.getElementById("LoginForm");
                var RegForm = document.getElementById("RegForm");
                var Indicateur = document.getElementById("Indicateur")

                    function register() {
                        RegForm.style.transform = "translateX(0px)";
                        LoginForm.style.transform = "translateX(0px)";
                        Indicateur.style.transform = "translateX(125px)"
                    }

                    function login() {
                        RegForm.style.transform = "translateX(300px)";
                        LoginForm.style.transform = "translateX(300px)";
                        Indicateur.style.transform = "translateX(25px)"
                    }

            </script>

    </body>
</html>