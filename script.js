//confirmation du mot de passe 
//verifions si le mot de passe et la confirmation sont conformes
var mdp1 = document.querySelector('.mdp1');
var mdp2 = document.querySelector('.mdp2');
mdp2.onkeyup = function(){
    //evenement lorsqu'on ecrit dans le champs : confirmation du mot de passe
    message_error = document.querySelector('.message_error');
    if(mdp1.value != mdp2.value){// s' il ne sont pas egaux
        // on affiche une message erreur
        message_error.innerText = "Les mot de passes ne sont pas conformes ";
    }else{
        //si non
        //on ecrit rien dans message_error
        message_error.innerText="";
    }
}