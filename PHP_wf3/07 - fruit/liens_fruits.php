<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Liens fruits</title>
</head>
<body>
    <!-- 
    1. Effectuer 4 liens HTML pointant sur le même page avec le nom des fruits.
    2. Faites en sorte d'envoyer 'cerises' dans l'URL si on clic sur le lien "cerises". (faire la même chose avec tout les fruits)
    3. Tenter d'afficher "cerises" sur la page web si l'on a cliqué dessus (si cerises est passé dans l'URL par conséquent / même chose avec tout les fruits)
    4. Envoyer l'information à la fonction calcul() afin d'afficher le prix pour 1kg de cerises (pareil pour tout les fruits)

    -->
    <div class="container text-center">
        <h1 class="display-4 text-center">LIENS FRUITS</h1><hr>

        <!-- condition ternaire : si l'indice 'choix' est définit dans l'URL, c'est à dire que l'on a cliqué sur un lien, on affiche le fruit sinon on affiche un message d'erreur 
        -->
        <?php 
        // <?= ---> echo 
        // ? remplace le IF
        // : remplace le else

        ?>
        <!-- condition ternaire PHP7 : -->
        <!-- <h4>Votre choix : <strong class="text-info"><?= (isset($_GET['choix'])) ? $_GET['choix'] : "Aucun fruit selectionné !"; ?></strong></h4> -->

        <!-- condition classique non ternaire : -->
        <h4>Votre choix : <strong class="text-info"><?php if(isset($_GET['choix'])) echo $_GET['choix'];  else echo "Aucun fruit selectionné !"; ?></strong></h4>

        <?php
        require_once("fonction.php");
        // La condition permet de vérifier si l'indice 'choix' est bien définit dans l'URL, donc par conséquent que l'on a cliqué sur un lien
        if(isset($_GET['choix']))
        {
            echo calcul($_GET['choix'], 1000); // on va crocheter dans l'URL pour récupérer le bon fruit sur lequel on a cliqué
        }
       
        ?>

        <ul class="col-md-2 offset-md-5 list-group">
            <li class="list-group-item"><a href="?choix=cerises">Cerises</a></li>
            <li class="list-group-item"><a href="?choix=bananes">Bananes</a></li>
            <li class="list-group-item"><a href="?choix=pommes">Pommes</a></li>
            <li class="list-group-item"><a href="?choix=peches">Pêches</a></li>
        </ul>
    </div>
</body>
</html>