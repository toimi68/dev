<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!--Lien Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- CDN Jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- lien de notre fichier JS -->
    <script src="ajax6.js"></script>
    <title>06 AJAX SELECT ID</title>

</head>
<body>

    <div class="container">

        <h1 class="display-4 text-center">06 AJAX INSERT ALL </h1><hr>

        <div id="resultat">
    <!-- Traitement php pour afficher l'ensemble de la table employé -->

         <?php
         require_once('init.php');
          $result = $bdd->query("SELECT * FROM employes");

           ?>
        <table class="table table-dark text-center"><tr>
        <?php for($i = 0; $i < $result->columnCount(); $i++): 
            $colonne = $result->getColumnMeta($i); ?>

            <th><?= $colonne['name'] ?></th>
        
        <?php endfor; ?>
        </tr>
        <?php while($employes = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <?php foreach($employes as $value): ?>
                <td><?= $value ?></td>
            <?php endforeach ?>
        </tr>
        <?php endwhile; ?>
        
       
        </table>
        </div>

        <div id="message"></div>

        <form class="col-md-4 offset-md-3" id="form1" method="post">

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
     <button type="submit" id="submit" class="btn btn-dark">Valider</button>


         
</body>
</html>