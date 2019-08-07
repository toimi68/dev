<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire 4</title>
</head>
<body>

    <h1 class="display-4 text-center">Formulaire 4</h1><hr>

    <?php
        // echo '<pre>'; print_r($_POST); echo '</pre>';

        echo '<div class="col-md-4 offset-md-4 alert alert-success text-center mx-auto">';
        foreach($_POST as $key => $value)
        {
            echo "$key : $value<br>";
        }
        echo '<div>';

        // Exo: si nous n'avions pas de BDD et que nous voudrions récupérer les emails des visituers du site, il serait intéressant de les enregistrer dans un fichier.txt
        // Il existe des fonctions en php qui permettent de le faire 
        // fopen() / fwrite () / fclose ()

        $fichier = fopen("liste.txt", "a"); // fopen() en mode "a" permet de créer le fichier
        fwrite($fichier, $_POST['pseudo'] . ' - ' . $_POST['email'] . "\r\n"); // fwrite () permet d'écrire dans le fichier représenté par $fichier
        // "\r\n" => séquence d'échappement pour passer à la ligne dans le fichier.txt     
        
        fclose($fichier); // fclose() qui n'est pas indispensable,permet de fermer le fichier et ainsi libérer de la ressource.
        
    ?>


</head>
<body>