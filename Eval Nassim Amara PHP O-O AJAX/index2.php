<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- lien Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Eval finale</title>

</head>
<body>

    
    <div class="container">

        <h1 class="display-4 text-center">Evaluation Finale </h1><hr>
                 <!--Main Navigation-->
         <nav class="navbar navbar-expand-sm bg-dark navbar-dark">...
             <ul class="navbar-nav">
                 <li class="nav-item active">
                     <a class="nav-link" href="#">Conducteur</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Vehicule</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Association</a>
                 </li>
             </ul>
        </nav>
<?php 
 require_once('init.php');
 $resultat = $bdd->query("SELECT * FROM conducteur");
//   echo '<pre>'; print_r($resultat); echo '</pre>'; pour vérifier que l'on a bien le tableau array
 ?>

<!-- affichage de la table 'conducteur' -->

   <table class="table table-dark text-center"><tr>
        <?php for($i = 0; $i < $resultat->columnCount(); $i++): 
            $colonne = $resultat->getColumnMeta($i); ?>

            <th><?= $colonne['name'] ?></th>
        
        <?php endfor; ?>
        </tr>
        <?php while($conducteur = $resultat->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <?php foreach($conducteur as $value): ?>
                <td><?= $value ?></td>
            <?php endforeach ?>
        </tr>
        <?php endwhile; ?>
        
       
        </table>
        </div>

 <?php //  on Réalise le contrôles des saisies du FORMULAIRE : 

//  echo  '<pre>'; print_r($_POST); echo '</pre>';

          $error = ''; // on déclarer une variable error à vide,qui va me stocker chaque message d'erreur
        
        if($_POST)// si on valide le formulaire, on entre dans le IF
        {         
         // champs prenom : le champs prénom doit contenir entre 2 et 20 caractères

        if(iconv_strlen($_POST['prenom']) <2 || iconv_strlen($_POST['prenom']) > 20)
        {
        $error .=  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 2 et 20 caractères !! </div>';
        }

 // si le champ 'nom' est vide, alors on entre dans la condition
           if(empty($_POST['nom'])) // isset teste l'existence d'une variable
           
            {
            $error .=  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le champ nom est obligatoire</div>' ;
            }

        } // Fin de la condition IF($_POST)

?>
   <!-- Formulaire du tableau Champ -->

  <form class="col-md-4 offset-md-4" method="post" action=""> <!-- method est toujours suivi de post qui va être utilisées pour l'envoi de données via les formulaires-->

      <div class="form-group">
      <label for="prenom">Prenom</label>
      <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom" >
      </div>

     <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" placeholder="nom"  name="nom">
      </div>
        <button type="submit" class="btn btn-light">Ajouter ce conducteur</button>
</body>
</html>

<?php


