<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Formulaire entreprise</title>
</head>
<body>
    <!-- 
    1. Réaliser un formulaire correspondant à la table 'employes' de la BDD 'entreprise' (sauf id_employes)
    2. Contrôler en PHP que l'on receptionne bien tout les champs du formulaire
    3. Connexion BDD
    4. Traitement PHP/SQL permettant l'insertion d'un employé à partir du formulaire
    -->
    <h1 class="display-4 text-center">Formulaire entreprise</h1><hr>

    <?php
    // Exo 2 :
    echo '<pre>'; print_r($_POST); echo '</pre>';

    // Exo 3 : 
    $bdd = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
    
    // Exo 4 : 
    if($_POST) // si on valide le formulaire, on entre dans la condition
    {
        $resultat = $bdd->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[service]', '$_POST[date_embauche]', '$_POST[salaire]')");
        // On utilise la superglobale $_POST pour aller crocheter à chaque champs du formulaire afin de récupérer sa valeur


        echo '<div class="col-md-6 offset-md-3 alert alert-success text-center">L\'employé <strong>' . $_POST['nom'] . '</strong> a bien été enregistré !!</div>';
    }
    
    ?>

    <form class="col-md-4 offset-md-4 text-center" method="post" action="">
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter prenom">
    </div>
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter nom">
    </div>
    <div class="form-group">
        <label for="sexe">Sexe</label>
        <select class="form-control" id="sexe" name="sexe">
            <option value="m">Homme</option>
            <option value="f">Femme</option>
        </select>
    </div>
     <div class="form-group">
        <label for="service">Service</label>
        <input type="text" class="form-control" id="service" name="service" placeholder="Enter service">
    </div>
     <div class="form-group">
        <label for="date_embauche">Date Embauche</label>
        <input type="date" class="form-control" id="date_embauche" name="date_embauche">
    </div>
    <div class="form-group">
        <label for="salaire">Salaire</label>
        <input type="text" class="form-control" id="salaire" name="salaire" placeholder="Enter salaire">
    </div>
    <button type="submit" class="col-md-12 btn btn-dark mb-4">Enregistrer</button>
    </form>
</body>
</html>