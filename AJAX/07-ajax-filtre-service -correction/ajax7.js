        $(document).ready(function () { // on séléctionne le DOM auquel on associe la méthode 'ready' qui executera la fonction une fois que le DOM sera chargé complétement
        $('#service').change(function(){
          // alert('test');
            ajax();
        });
    function ajax()
    {
        var service = $('#service').val();
        console.log(service);

        var parameters = "service="+service;
        console.log(parameters);
    

        // la réponse de la requête 'retour' AJAX se trouve dans 'data'
        $.post("ajax7.php", parameters, function(data){ // data sert à stocker le resultat de la requete ajax
            $('#resultat').html(data.resultat); // on selectionne la div id 'resultat' pour coller le tableau ($tab['resultat']) définit dans la page ajax6.php
            }, 'json');
      }
    });
