<?php
//demarer le session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
<?php
if(isset($_POST['button_inscription'])){
      //si le formulaire est envoye
      //se connecter a la base de donnee
      include "connexion_bdd.php";
      //extraire les info du formulaire
      extract($_POST);
         //  verifions si les champs sont vides
         if(isset($email) && isset($mdp1) && $email != "" && $mdp1 != "" && isset($mdp2) && $mdp2 != ""){
             // verifions que les mots de passes sont conformes
             if($mdp2 != $mdp1){
                 //s'ils sont different
                 $error = "Les mots de passe sont differents !";
             }else{
                 //si non,verifions si l'email existe
                 $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE email = '$email'");
                 if(mysqli_num_rows($req) == 0){
                     //si ca n' existe pas,creons le compte
                     $req = mysqli_query($con , "INSERT INTO utilisateurs VALUES (NULL, '$email' , '$mdp1') ");
                     if($req){
                         //si le compte a ete creer ,reons une variable pour afficher un message dans la page du
                         //connnexion
                         $_SESSION['message'] = "<p class='message_inscription'>Votre compte a ete creer avec succes !</p>";
                        //redirecton vers la page de connexion
                        header("Location:index.php");
                     }else {
                         //si non 
                         $error = "Inscription echoue !";
                     }
                 }else {
                     //si ca existe
                     $error = "Cet Email existe deja !";
                 }
             }
        
        }else {
            $error = "Veuillez remplir tous les champs !";
        }
}
?>

    <form action="" method="POST" class="form_connection_inscription">
        <h1>INSCRIPTION</h1>
            <p class="message_error">
            <?php
                //affichons l'erreur
                if(isset($error)){
                    echo $error;
                }
                ?>

            </p>
            <label for="">Adresse Mail</label>
            <input type="email" name="email">
            <label for="">Mots de passe</label>
            <input type="password" name="mdp1" class="mdp1">
            <label for="">Confirmation Mots de passe</label>
            <input type="password" name="mdp2" class="mdp2">
            <input type="submit" value="Inscription" name="button_inscription">
            <p class="link">Vous avez un compte ? <a href="index.php">Se connecter</a></p>
    </form>
    <!--relie notre page a notre fichier javascript-->
    <script src="script.js"></script>
</body>
</html>