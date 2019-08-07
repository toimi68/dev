<?php
require_once("include/header.php");
require_once("include/nav.php"); 

/* 
    require et include : 
    Pas de différence entre les deux... sauf en cas d'erreur sur le nom du fichier: 
        - include génère une erreur et continue l'execution du script
        - require génère une erreur et stop l'execution du script

    Le once vérifie si le fichier a déjà été inclus, si c'est la cas, il ne le ré-inclus pas.
*/
?>        
    <section class="p-4 text-center border border-dark" style="height:400px">
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
    </section>

<?php
require_once("include/footer.php");
        