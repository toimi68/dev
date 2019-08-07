    $(document).ready(function(){

        var prenom = $('#personne').text(); // on récupére le contenu de la div, qui sera envoyé comme paramètre à la requête AJAX 'aller'
        console.log(prenom);

        var parameters = "prenom="+prenom;
        console.log(parameters);

        // la réponse de la requête 'retour' AJAX se trouve dans 'data'
        $.post("ajax4.php", parameters, function(data){
            $('#resultat').html(data.resultat); // on selectionne la div id 'resultat' pour coller le tableau ($tab['resultat']) définit dans la page ajax4.php
        }, 'json');
    });
