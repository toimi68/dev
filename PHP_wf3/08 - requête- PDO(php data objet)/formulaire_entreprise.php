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
         1. Réaliser un formulaire correspondant à la table 'employes' de la BDD 'entreprise' (saud id_employes)
         2. Contrôler en PHP que l'on receptionne bien tout les champs du formulaire
         3. Connexion BDD
         4. Traitement PHP/SQL permettant l'insertion d'un employé à partir du formulaire

    -->
 

        <h1 class="display-4 text-center border border-primary">FORMULAIRE entreprise</h1><hr>

    <!-- 2. --> 
         <?php 
        
        echo '<pre>'; print_r($_POST); echo '</pre>'; 

        // 3. Connexion à la BDD

         $bdd = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING, PDO:: MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

         echo '<pre>'; var_dump($_POST); echo '</pre>';

         // 4. 
         if($_POST) // si on valide le formulaire, on entre dans la condition
         {
             $resultat = $bdd->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]','$_POST[service]', '$_POST[date_embauche]','$_POST[salaire]')");
             // on utilise la superglobale $_POST pour aller crocheter à chaque champs du formulire afin de récupérer sa valeur

             echo '<div class="col-md-6 offset-md-3 alert alert-success text-center">L\'employé  <strong>'. $_POST['nom'] . '</strong> a bien été enregistré !!</div>'; 
         }

       

        



        ?>

    <form class="col-md-4 offset-md-4" method="post" action="">

                     <!-- Champs prenom  -->
      <div class="form-group">
    <label for="nom">Prenom</label>
    <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom" >
      </div>
                     <!-- Champs nom  -->
     <div class="form-group">
    <label for="nom">nom</label>
    <input type="text" class="form-control" id="nom" placeholder="nom"  name="nom">
     </div>
                     <!-- Champs sexe  -->
         <div class="form-group">
      <label for="sexe">Sexe</label>
      <select class="form-control" id="sexe" name="sexe">
          <option value="m">HOMME</option>
          <option value="f">FEMME</option>
        </select>
                     <!-- Champs service  -->
        <div class="form-group">
    <label for="service">Service</label>
    <input type="text" class="form-control" id="service" placeholder="service"  name="service">
     </div>
                     <!-- Champs date -->
      <div class="form-group">
    <label for="date_embauche">Date Embauche</label>
    <input type="date" class="form-control" id="date_embauche" placeholder="date_embauche"  name="date_embauche">
     </div>
                    <!-- Champs salaire  -->
      <div class="form-group">
    <label for="salaire">Salaire</label>
    <input type="text" class="form-control" id="salaire" placeholder="salaire"  name="salaire">
     </div>
                     <!-- Champs bouton submit  -->
     <button type="submit" class="btn btn-dark">Enregistrer</button>


  </div>
</body>
</html>