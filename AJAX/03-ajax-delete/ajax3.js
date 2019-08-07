$(document).ready(function(){ // on s'assure que le DOM soit bien chargés,puis on execute la fonction
    $('#submit').click(function(event){ /// on selectionne le bouton submit
        event.preventDefault();// methode qui permet d'annuler le controle submit pour recharger la page
        ajax();// pour chaque click sur le bouton, on execute la fonction ajax() déclaré ci-dessous
    });

    function ajax()
    {
        var id = $('#personne').val();// on séléctionne le selecteur id 'personne' afin de récuperer l'id de l'employé selectionné
        console.log(id);

        var parameters = "id="+id;// on définit les paramètres à envoyer à la requête AJAX 'aller' qui sera transmit à la requête de suppression PHP dans le fichier ajax3.php
        console.log(parameters);
    
        /*
         post: méthode JQUERY permettant d'envoyer des requêtes AJAX en HTTP
         arguments : 
                     1.l'URL de destination des requêtes AJAX
                     2. Les paramètres envoyés avec la requete AJAX 'aller'
                     3. En cas de succès, on receptionne le résultat de la requête AJAX 'retour'
                     4. Type de transport de données 'JSON'
        */

        $.post("ajax3.php", parameters, function(data){
            $('#employes').html(data.resultat);// on selectionne la div id 'employes' et on remplace le selecteur inital par le selecteur mis à jour, on ecrase un selecteur par un autre
            $('#message_supp').html(data.message); // on sélectionne la div id 'message_supp' afin d'envoyer via la requete AJAX 'retour' le message de validation
        }, 'json');
    }
});