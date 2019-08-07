$(document).ready(function(){ // on prépare le code javascript au chargement de la page
//  on ecoute l'évènement
    $("#submit").click(function(e){ // qd l'internaute cliquera sur le bouton,on va executer ds le code qui sera entre les '{}'
    // On empeche le rechargement de la page
    e.preventDefault();
    // on lance la fonction que l'on souhaite exécuter
    afficheProduit();
});

function afficheProduit(){
   var resultat = $('#resultat').val();
//    console.log(resultat);
    var parameters = "resultat = " + resultat;
    // console.log(parameters);
    $.post('ajax.php' , parameters, function(data){
        $('#resultat').html(data.resultat);
    }, 'json');
}// Fin function afficheProduit ()


}); // FIN $(document).ready(function()