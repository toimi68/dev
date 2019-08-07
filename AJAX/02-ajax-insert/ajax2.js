    // on séléctionne le DOM auquel on associe la méthode 'ready' qui executera la fonction une fois que le DOM sera chargé complétement
    $(document).ready(function(){ 
    // on selectionne le bouton submit auquel on associe l'évènement 'click'
    // 'event' représente l'évènement 'click'
    $('#submit').click(function(event){
        event.preventDefault(); // preventDefault() fonction prédéfinie qui permet d'annuler le comportement du bouton submit qui a pour rôle de recharger le code/la page
        ajax(); // fonction utilisateur executée ci-dessous
    });

    function ajax()
    {
        var personne = $('#personne').val();
        // on selectionne le champs input afin de récupérer la valeur saisie dans le champ pour la transmettre à la requête 'aller' AJAX
        console.log(personne);


        var parameters = "personne="+personne;
     // on définit les paramètres à envoyer avec la requète 'aller' AJAX 
        // "personne=" permet de définir où le paramètre va être envoyé dans le fichier PHP ($personne)
       // l'indice personne est egale à la personne que je viens de saisir
        console.log(parameters);

        // la méthode 'post' de JQUERY permet d'envoyer des requêtes HTTP AJAX , plusieurs paramètres
        /*
           1. l'URL de destination des requêtes AJAX
           2. Les paramètres à fournir à la requète
           3. En cas de succès, function(data) recupère les données de la requète 'retour', tout se trouve dans 'data'.
           4. Type de transport de données : JSON
        */
        $.post("ajax2.php", parameters, function(data){ // POST sert a envoyer des requetes en http dans ce fichier,en prenant en compte le parametre
        // ce qu'on a en retour de resultat ds json sera dans data
            $('#resultat').html(data.resultat); // on sélectionne la div id 'resultat' et on accroche le message d'erreur ou de validation à l'intérieur
            // data.resultat --> résultat correspond à l'indice 'resultat' du tableau array $tab['resultat'] du fichier ajax2.php
            $('#personne').val(''); // permet de vider le champs input une fois le formulaire validé
        }, 'json');
    }
});