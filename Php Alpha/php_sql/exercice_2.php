<!-- EXERCICE 1 : 

a- Créer un formulaire d'inscription (methode "POST") avec les champs :
=> nom
=> prenom
=> email
=> Adresse
=> code postal
=> Genre (f/h)

b- Afficher dans un tableau PHP les valeurs saisies dans le formulaire.

c- Effectuer tous les contrôles des champs
-->



     <!-- Afficher dans un tableau php les valeurs saisies dans le formulaire. -->

         <?php

            echo  '<pre>'; print_r($_POST); echo '</pre>';
        

if($_POST){

    //Contrôle du champ nom , si le champs nom est vide,alors il y a une alerte

        if(empty($_POST['nom']))     // empty va vérifié que le champ existe et si il est vide, isset juste si l'indice existe       
        {
         echo  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le champ nom est obligatoire</div>';
        }
        /* Autre méthode dans la negation // si le nom est vide et qu'il est compris entre 5 et 10 alors on entre dans la condition

         if(!empty($_POST['nom']) && iconv_strlen($_POST['nom']) < 5 && iconv_strlen(_POST['nom']) < 10) {
            echo '<div>' prenom ok </div>';
        }

        // (!isset(_POST['nom]) || iconv_strlen ($_POST['nom']) < 5 || iconv_strlen ($_POST['nom']) > 10) {
            echo '<div class="alert alert-warning text-alert"> *Saisissez un nom valide (5 à 10 caractères) </div>';
        }
        */

   // Contrôle du champ 'prenom': 

        if(!isset(_POST['prenom']) || iconv_strlen ($_POST['prenom']) < 5 || iconv_strlen ($_POST['prenom']) > 10) 
        {
            echo '<div class="alert alert-warning text-alert"> *Saisissez un nom valide (5 à 10 caractères) </div>';



   // Contrôle du champs email: il doit etre de format nom@exemple.com 
           
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
         echo  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Email non valide !! </div>' ;
        }

   // Contrôle du champs adresse: il ne doit pas depasser 40 caractères
           
        if(strlen($_POST['adresse']) >= 40)
        {
         echo '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Adresse non valide !! </div>' ;      
        }
   
   // contrôle du champs code postale : si il ne comporte pas du numérique,champs invalide
}

    if(conv_strlen($_POST['cp']) !== 5 || !is_numeric($_POST['cp']))

    {
        echo '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark> code postale non valide !! </div>';
    }

    // code postale
    if(preg_match('#^[0-9]{5}+$#', $_POST['cp']))
    {
        echo 'div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark> Merci de remplir le champ adresse !! </div>';
    }

    // champs genre

    if(!isset($_POST['genre']) || $_POST(['genre']) !='f' && $_POST(['genre']) !='m' ) // si c'est différent de femme et d'homme on entre dans la condition
    {
        echo 'div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark>Choisissez un genre </div>';
    }
            // fin if($_POST)

         ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Exo 1 workshop</title>
</head>
<body>
        <form class="col-md-4 offset-md-4" method="post" action="">

        <!-- Champs prenom -->
        <div class="form-group">
            <label for="prenom">prenom</label>
            <input type="text" class="form-control" id="prenom"   name="prenom">
        </div>

        <!-- Champs nom -->
         <div class="form-group">
           <label for="nom">Nom</label>
           <input type="text" class="form-control" id="nom"  name="nom" >
         </div>

         <!-- Champs email -->
         <div class="form-group">
            <label for="email">Adresse Mail</label>
            <input type="text" class="form-control" id="email" name="email" > 
         </div>
         
         <!-- Champs adresse -->
         <div class="form-group">
             <label for="adresse">Adresse</label>
             <input type="textarea" class="form-control" id="adresse" name="adresse"  >
         </div>

        <!-- Champs code postal -->
         <div class="form-group col-mb-3">
             <label for="code_postal">Code postal</label>
            <input type="text" class="form-control" id="code_postal" name="cp" >
         </div>

         <!-- Champs Genre -->
          <div class="form-group">
            <label for="sexe">Genre</label>
            <select class="form-control" id="genre" name="genre">
            <option value=""> - GENRE -</option>
            <option value="m">Masculin</option>
            <option value="f">Feminin</option>
            </select>
        </div>


        <!-- bouton submit-->
        
  <button type="submit" class="btn btn-primary">Submit</button>




    
</body>
</html>