<!-- Déconnexion d'un compte membre-->
<?php  
        session_start();   
        if(isset($_SESSION['MailUtil']) and $_SESSION['PasswordUtil'])
        {
                session_destroy();
                $_SESSION['MailUtil']= $MailUtil;
                $_SESSION['PasswordUtil']= $PasswordUtil;
        }  
        header('Location: ../index.php');
         exit();                   
?>