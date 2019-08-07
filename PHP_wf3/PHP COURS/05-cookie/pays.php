<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cookie PHP</title>
</head>
<body>
    <div class="container text-center">
        <h1 class="display-4 text-center">COOKIE PHP</h1><hr>

        <?php 
        if(isset($_GET['pays'])) // on entre dans la condition dans le cas où l'on a cliqué sur un lien et donc envoyé un pays dans l'URL 
        {
            $pays = $_GET['pays'];
        }
        elseif(isset($_COOKIE['pays'])) // on entre dans le elseif dans le cas où un cookie a été créer et que par exemple nous revenons sur le site 3 mois plus tard, la valeur du cookie sera afficher  
        {
            $pays = $_COOKIE['pays'];
        }
        else // on entre dans le cas else lors de la première visite sur le site, lorsqu'aucun cookie n'est crée 
        {
            $pays = 'fr';
        }
        //---------------------------------------------------------------
        // Création fichier cookie 
        $un_an = 365*24*3600; //correspond à une année ens seconde, ce sera la durée de vie du cookie

        setcookie("pays", $pays, time()+$un_an); // permet de créer un fichier cookie qui est conservé côgté client, c'est à dire sur l'ordinateur de l'internaute
        // 3 arguments : nom du cookie / valeur du cookie / durée de vie
        echo '<pre>'; print_r($_COOKIE); echo '</pre>';

        // Un cookie est un fichier qui est conservé côté client, c'est à dire sur le pc du navigateur, il contient des données non sensibles (derniers articles consultés, langue préférée du site etc...)

        switch($pays)
        {
            case 'fr': 
                echo "Vous êtes sur un site en français<br>";
            break;
            case 'es': 
                echo "Vous êtes sur un site en espagnol<br>";
            break;
            case 'an': 
                echo "Vous êtes sur un site en anglais<br>";
            break;
            case 'it': 
                echo "Vous êtes sur un site en italien<br>";
            break;
        }
        ?>

        <h2>Votre langue : </h2>

        <ul class="col-md-2 offset-md-5 list-group">
            <li class="list-group-item"><a href="?pays=fr">France</a></li>
            <li class="list-group-item"><a href="?pays=es">Espagne</a></li>
            <li class="list-group-item"><a href="?pays=an">Angleterre</a></li>
            <li class="list-group-item"><a href="?pays=it">Italie</a></li>
        </ul>
    </div>
</body>
</html>