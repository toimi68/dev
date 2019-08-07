<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="ajax5.js"></script>

    <title>05 SELECT ID</title>
</head>
<body>
<div class="container">
    <h1 class="display-4 text-center">05 AJAX SELECT ID</h1><hr><br>

    <!-- 1. Réaliser un sélecteur qui regroupe tout les nom des employes avec un bouton submit -->    
    <form method="post" action="" class="col-md-4 offset-md-4">
            <div class="form-group">
                <select class="form-control" name="personne" id="personne">   
                <?php 

                    require_once('init.php');            
                    $result = $bdd->query("SELECT * FROM employes");
                ?>
                    <?php while($employes = $result->fetch(PDO::FETCH_ASSOC)):?>
                        <option value="<?= $employes ['id_employes']?>"><?= $employes['nom']?></option>
                    <?php endwhile; ?>
                </select> 
            </div>
        <br>
        <input type="submit" value="Selectionner" id="submit" class="col-md-12 btn btn-dark">
    </form>
    <br>

    <div id="personne" class="text-center"><?$prenom?></div>


    <div id="resultat">
    
    <!-- 2. Réaliser le script PHP permettant d'afficher l'ensemble de la table employes -->
        <?php $result = $bdd->query("SELECT * FROM employes"); ?>
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
</div>
    
</body>
</html>