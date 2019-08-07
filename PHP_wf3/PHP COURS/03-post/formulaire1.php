<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Formulaire 1</title>
</head>
<body>
    <!-- Exo : réaliser un formulaire HTML avec les champs suivants : email, mot de passe et un bouton submit -->
    <h1 class="display-4 text-center">Formulaire 1</h1><hr>

    <?php 
    echo '<pre>'; print_r($_POST); echo '</pre>'; // permet d'observer les données saisie dans le formulaire qui vont se stocker directement dans la superglobale $_POST, les indices correspondent aux attributs 'name' du formulaire HTML

    // Exo : afficher les données saisie  dans le formulaire en passant par la superglobale $_POST avec un affichage conventionnelle (sans print_r ou var_dump)
    foreach (array_keys($_POST) as $b) {
       $test = filter_input(INPUT_POST, $b);
       echo '<pre>'; print_r($test); echo '</pre>';
    }

    // on parcours la superglobale $_POST de type ARRAY avec une boucle foreach
    foreach($_POST as $key => $value)
    {
        echo "$key => $value<br>"; 
    }
    echo '<hr>';

    // on extrait les valeurs une par une en passant par la supergolbale $_POST en crochetant aux différents indices

    // Sans la condition IF, au premier chargement de la page, nous avons 2 erreurs 'undifined', c'est du au fait que le formulaire n'a pas été validé et donc les indices 'email' et 'mdp' ne sont pas reconnu 

    // Si la condition IF est vérifiée, si elle renvoi 'true', cela veut dire que l'on a soumit le formulaire et les indices 'email' et 'mdp' sont bien détéctés

    if($_POST)
    {
        echo "Email : $_POST[email]<br>";
        echo "Mot de passe  : " . $_POST['mdp'] . "<br>";
    }
   

    echo '<hr>';

    ?>

    <form class="col-md-4 offset-md-4" method="post" action=""><!-- method : comment vont circuler les données / action : url de destination -->
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"><!-- il ne faut surtout pas oublier les attributs name sur le formualire html, sinon aucune donnée saisie ne sera récupérée en PHP -->
    </div>
    <div class="form-group">
        <label for="mdp">Password</label>
        <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</body>
</html>