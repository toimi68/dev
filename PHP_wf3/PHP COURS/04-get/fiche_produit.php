<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Fiche produit</title>
</head>
<body>
    <div class="container text-center">
        <h1 class="display-4 text-center">Détail du produit n° <strong class="text-info"><?= $_GET['id'] ?></strong></h1><hr>
        
        <?php 
        echo '<pre>'; print_r($_GET); echo'</pre>'; 
        // Le sinformations envoyés dans l'URL sont automatiquement stockées dans la superglobale $_GET, cela retourne un tableau ARRAY associatif

        // Exo : afficher les données transmit dans l'URL avec un affichage conventionnel en excluant l'indice 'id'
        echo '<div class="col-md-4 offset-md-4 mx-auto text-center alert alert-info">';
        foreach($_GET as $key => $value)
        {
            if($key != 'id') // si l'indice est différent de 'id', alors on affiche l'indice en fonction de la valeur de la superglobale $_GET (ARRAY), c'est ce qui permet d'exclure l'indice 'id'
            {
                 echo "<strong>$key</strong> : $value<br>";
            }  
        }
        echo '</div>';

        ?>

        <hr><a href="boutique.php">Retour à la boutique</a>
    </div>
</body>
</html>