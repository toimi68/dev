<?php
require_once("include/header.php");
require_once("include/nav.php");// pour soulager le serveur,on rajoute le "once" mais on peut ecrire "require"

/*
        require et include : 
        pas de différence entre les deux,...sauf en cas d'erreur sur le nom du fichier:
            - include génère une erreur et continue l'éxécution du script
            - require génère une reeur etstop l'éxécution du script
            
        Le once vérifie si le fichier a déjà été inclus, si c'est le cas,il ne le ré-inclus pas.

*/
?>

    <section class="p-4 text-center border border-dark" style="height:400px">
        Voici le contenu de la page d'accueil <br>
        Voici le contenu de la page d'accueil <br>
        Voici le contenu de la page d'accueil <br>
        Voici le contenu de la page d'accueil <br>
        Voici le contenu de la page d'accueil <br>
    </section>

    <?php
    require_once("include/footer.php");
    ?>
