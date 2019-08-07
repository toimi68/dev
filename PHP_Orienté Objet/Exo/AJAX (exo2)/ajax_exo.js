$(document).ready(function () { // on sélectionne le DOM auquel on associe la méthode 'ready' qui executera la fonction une fois que le DOM sera chargé completement

    // $('#action').click(function(event) {
    //     event.preventDefault();
    //     ajax();

    $('#submit').click(function(event) {
        event.preventDefault();
        ajax();


        function vider() {
            document.getElementById("reference").value ="";
            return false;
        };
        
    });
    function ajax()
    {
    var reference = $('#reference').val();
    console.log(reference);

    var categorie = $('#categorie').val();
    console.log(categorie);

    var titre = $('#titre').val();
    console.log(titre);

    var description = $('#description').val();
    console.log(description);

    var couleur = $('#couleur').val();
    console.log(couleur);

    var taille = $('#taille').val();
    console.log(taille);

    var public = $('#public').val();
    console.log(public);

    var photo = $('#photo').val();
    console.log(photo);

    var prix = $('#prix').val();
    console.log(prix);

    var stock = $('#stock').val();
    console.log(stock);

    var parameters = "reference="+reference+"&categorie="+categorie+"&titre=" +titre+"&description="+description+"&couleur="+couleur+"&taille="+taille+"public="+public+"photo="+photo+"prix="+prix+"stock="+stock;
    console.log(parameters);

    // la réponse de la requête 'retour' AJAX se trouve dans 'data'
    $.post("ajax_exo.php", parameters, function(data){ // data sert à stocker le resultat de la requete ajax
    $('#form1').html(data.resultat); // on selectionne la div id 'resultat' pour coller le tableau ($tab['resultat']) définit dans la page ajax_exo.php
        $('#message').html(data.message);
    }, 'json');


    }
});
