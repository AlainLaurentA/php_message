<?php
//connexion a la base de donnees
$con = mysqli_connect("localhost","root","","chate_youtube");
//gerez les accents et autres caracteres
$req= mysqli_query($con , "SET NAMES UTF8");
if(!$con){
    //si la connexion echoue , afficher:
    echo "Connexion echoue";        
}


?>