<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Formulaire 2</title>
</head>
<body>
    <!-- 
    1. Réaliser un formulaire HTML avec les champs suivants : pseudo, mdp, confirmer mdp, nom, prénom, email, sexe, téléphone, adresse, ville, code_postal et un bouton submit

    2. Contrôler en PHP que l'on receptionne bien toute les données du formulaire

    3. Faites en sorte d'informer l'internaute si le pseudo n'est pas compris entre 2 et 20 caractères

    4. Faites en sorte d'informer l'internaute si les mots de passe ne sont pas identiques

    5. Faites en sorte d'informer l'internaute si l'email n'est pas au bon format (indice : fonction prédéfinie filter_var)

    6. Faites en sorte d'informer l'internaute si le code postal n'est pas de type numérique (fonction prédéfinie : is_numeric) et si il est différent de 5 caractères

    7. Faites en sorte d'informer l'internaute si le champs nom est laissé vide.

    -->
    
    <h1 class="display-4 text-center">Formulaire 2</h1><hr>

    <?php 
    // Exo 2 : 
    echo '<pre>'; print_r($_POST); echo'</pre>';

 
    if($_POST) // si on valide le formulaire, on entre dans le IF
    {
        $error = '';
        // Exo 3 :
        // Si la taille du champs pseudo est inférieur à 2 ou si elle est supérieur à 20 alors on entre dans les accolades du IF
        if(iconv_strlen($_POST['pseudo']) < 2 || iconv_strlen($_POST['pseudo']) > 20)
        {
            $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 2 et 20 caractères !! </div>';
        }

        // Exo 4 : 
        // Si la valeur du champs mot de passe est différenet du champs mot de passe confirm, allors on entre dans les accolades du IF
        if($_POST['mdp'] !== $_POST['mdp_confirm'])
        {
            $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Vérifier les mots de passe !! </div>';
        }

        // Exo 5 :
        // Si le champs 'email' n'est pas (!) au bon format alors on entre dans les accolades du IF
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Email non valide !! </div>';
        }

        // Exo 6 : 
        // Si la taille du champ 'pseudo' est différente de 5 caractère ou si le champs n'est pas de type numérique, alors on entre dans les accolades du IF
        if(iconv_strlen($_POST['cp']) !== 5 || !is_numeric($_POST['cp']))
        {
            $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Code postal non valide !! </div>';
        }

        // 7. Faites en sorte d'informer l'internaute si le champs nom est laissé vide.
        // Si le champ 'nom' est vide, alors on entre dans la condition IF
        if(empty($_POST['nom']))
        {
            $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Merci de remplir le champs nom !! </div>';
        }

        // Exo 8 : 
        if(!preg_match('#^[0-9]{10}+$#', $_POST['telephone']))
        {
            $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Téléphone non valide, caractères non autorisés !! </div>';
        }

        // Exo 9 : faites en sorte d'informer l'internaute si il a correctement rempli le formulaire et qu'il n'y a pas de messages d'erreurs

        /*
            preg_match() : une expression régulière (regex) est toujours entouré de dieze afin de préciser les options
            ^ indique le debut de la chaine
            $ indique la fin de la chaine
            + est la pour dire que les caractères peuvent être utilisés plusieurs fois
        */
        echo $error; // on fait une echo de $error pour afficher les message d'erreurs
        /*
            On stock tout les messages d'erreurs dans la variable '$error', si cette varaible est vide, cela veut dire que nous ne sommes entrer dans aucune des conditions IF, donc que l'internaute a bien rempli les champs contrôlés, on affiche donc un message de validation
        */

        // Exo 9 : 
        if(empty($error))
        {
            echo '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Inscription validée !! </div>';
        }


    }
    
    ?>

    <form class="col-md-4 offset-md-4" method="post" action="">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo">
    </div>
     <div class="form-group">
        <label for="mdp">Mot de passe</label>
        <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Password">
    </div>
     <div class="form-group">
        <label for="mdp_confirm">Confirmer mot de passe</label>
        <input type="text" class="form-control" id="mdp_confirm" name="mdp_confirm" placeholder="Confirmer mot de passe">
    </div>
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter nom">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
     <div class="form-group">
    <label for="sexe">Sexe</label>
    <select class="form-control" id="sexe" name="sexe">
      <option value="m">Homme</option>
      <option value="f">Femme</option>
    </select>
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone">
    </div>
    <div class="form-group">
        <label for="adresse">Adresse</label>
        <textarea class="form-control" id="adresse" name="adresse" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville" placeholder="Enter ville">
    </div>
    <div class="form-group">
        <label for="cp">Code Postal</label>
        <input type="text" class="form-control" id="cp" name="cp" placeholder="Enter code postal">
    </div>
   
    <button type="submit" class="col-md-12 btn btn-dark mb-4">Inscription</button>
    </form>
</body>
</html>