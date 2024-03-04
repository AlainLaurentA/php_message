<?php
    
    if(isset($_SESSION['user'])){// si l'utilsateurs s'est connectee
        //connexion ala base de donnee
        include "connexion_bdd.php";
        //requete pour afficher les messages
        $req = mysqli_query($con ,"SELECT * FROM messages ORDER BY id_m DESC");
        if(mysqli_num_rows($req) == 0){
            //s'il n'y a pas encore de message
            echo "Message vide";
        }else {
            //si oui
            while($row= mysqli_fetch_assoc($req)){
                //si c'est vous qui avez envoye le message on utilise ce format :
                    if($row['email'] == $_SESSION['user']){
                        ?>              
                            <div class="message your_message">
                                <span>Vous</span>
                                <p><?=$row['msg']?></p>
                                <p class="date"><?=$row['date']?></p>
                            </div>                              
                    <?php
                    }else {
                        //si vous n'etes pas l'auteur du message,on affiche ce message sur le format:                         
                          ?>
                         <div class="message others_message">
                            <span><?=$row['email']?></span>
                            <p><?=$row['msg']?></p>
                            <p class="date"><?=$row['date']?></p>
                        </div>
                         <?php
                    }
            }
        }
        
    }
?>

           