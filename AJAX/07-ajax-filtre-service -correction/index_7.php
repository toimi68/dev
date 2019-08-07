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
    <script src="ajax7.js"></script>
    <title>07 AJAX FILTRE SERVICE</title>

</head>
<body>  

    <div class="container">

        <h1 class="display-4 text-center">07 AJAX FILTRE SERVICE </h1><hr>

        <!-- 1. Créer un formulaire avec un selecteur de tout les services distinct de la table employé en PHP sans bouton submit, on utilisera l'évènement 'change' en JQUERY pour afficher le bon resultat -->
        <form action="" class="col-md-4 offset-md-4 text-center">
        <div class="form-group">
        <label for="service">Liste des services</label>
        <?php
        require_once('init.php');
        $result = $bdd->query("SELECT DISTINCT service FROM employes")
        ?>
        <select class="form-control" id="service" name="service">
        <?php while($employes = $result->fetch( PDO::FETCH_ASSOC)):?>

        <option value="<?= $employes['service']?>"><?= $employes['service']?></option>
        <?php endwhile; ?>
        </select>
        </div>    
        </form><hr>

        <div id="resultat">
            
    <!-- 2. Réaliser le traitement PHP permettant d'afficher l'ensemble de la table employé  
        Traitement php pour afficher l'ensemble de la table employé -->
         
        

        <div id="message"></div>

        <form class="col-md-4 offset-md-3" method="post">                  

     <?php
         require_once('init.php');
          $result = $bdd->query("SELECT * FROM employes");

           ?>
        <table class="table table-dark"><tr>
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


         
</body>
</html>