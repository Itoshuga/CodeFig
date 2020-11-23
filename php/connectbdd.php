<!-- Connexion à la base de donnée localhost-->
<?php
/*$host = "172.31.0.37"; 
$user = "devE";
$passwd  = "root"; 
$bdd =  "lowhifiE";  
$mysqli = mysqli_init(); 
if (!$mysqli) 
{     
    die('mysqli_init ne fonctionne pas'); 
} 
if (!$mysqli->real_connect($host, $user, $passwd, $bdd)) 
{     
     die('Connect Error (' . mysqli_connect_errno() . ')'. mysqli_connect_error()); 
}*/


$host = "localhost"; 
$user = "root";    //   root par exemple 
$passwd  = "root"; 
$bdd =  "codefig";  
$mysqli = mysqli_init(); 
if (!$mysqli) 
{     
    die('mysqli_init ne fonctionne pas'); 
} 
if (!$mysqli->real_connect($host, $user, $passwd, $bdd)) 
{     
     die('Connect Error (' . mysqli_connect_errno() . ')'. mysqli_connect_error()); 
}

?>