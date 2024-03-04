<?php
//demare la session
session_start();
if(!isset($_SESSION['user'])){
    //si l'utilisation n'est pas connecte
    //redirection versla page de connexion
    header("location:index.php");
}
$user = $_SESSION['user'] //email de l'utilisateur
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$user?> | CHAT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chat">
        <div class="button-email">
            <span><?=$user?> </span>
            <a href="deconnexion.php" class="Deconnexion_btn">Deconnexion</a>
        </div>
        <!--message-->
        <div class="message_box">
           <?php
           //inclure la page messages.php
           include "messages.php";
           ?>
            
        </div>
        <!--fin message-->
        <?php
        //envoie des messages
        if(isset($_POST['send'])){
            //recuperons le message
          $message = $_POST['message'];
            //connexion a la base de donnee
            include ("connexion_bdd.php");
            //verifions si le champ n'est pas vide
            if(isset($message) && $message != ""){
                //inserer le message dans la base de donnees
                $req = mysqli_query($con , "INSERT INTO messages VALUES (NULL ,'$user' , '$message',NOW())");
                //On actualise la page
                header('location:chat.php');
            }else {
                //si le message est vide , on actualise la page
                header('location:chat.php');
            }

        }
        ?>
        <form action="" class="send_message" method="POST">
            <textarea name="message" id="" cols="30" rows="2" placeholder="Votre message"></textarea>
             <input type="submit" value="Envoye" name="send">
        </form>
    </div>
</body>
</html>