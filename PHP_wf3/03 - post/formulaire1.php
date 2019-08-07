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
    <!-- Exo: réaliser un formulaire HTML avec les champs suivants : 
        email,mot de passe et un bouton submit -->
    
        <h1 class="display-4 text-center">Formulaire 1</h1><hr>

        <?php
          echo '<pre>'; print_r($_POST); echo '<pre>'; // cette superglobal,lorsqu'on va valider le formulaire,les données vont etre ds le superglobal. Permet d'observer les données saisie dans le formulaire qui vont se stocker directement dans la superglobale $_POST, les indices correspondent aux attributs 'name' du formulaire HTML
          
          // exo : afficher les données saisie dans le formulaire en passant par la superglobale $ _POST avec un affichage conventionnelle ( sans print_r ou var__dump)

          echo '<hr>';

           foreach($_POST as $value)
            {
                echo "$value<br>";
               }
            echo '<hr>';

          //  corriger  
          
          foreach($_POST as $key => $value) 
          { 
            echo "$key => $value <br>";
          } 
          echo '<hr>';
          
          // on extrait les valeurs une par une en passant par la superglobale $_POST en crochetant aux différents indices

          // Sans la condition If,au premier chargement de la page,nous avons 2 erreurs 'undifined' c'est du au fait que le formulaire n'a pas été validé et donc les indices 'email' et 'mdp' ne sont pas reconnu

          // si la condition if est vérifiée,si elle renvoie 'true',cela veut dire que l'on a soumit le formulaire et les indices 'email' et 'mdp' sont bien détéctés

          if($_POST)
          {
              echo "Email : $_POST[email]<br>";
              echo "mot de passe : " . $_POST['mdp'] . "<br>";
          }
         

          echo '<hr>';

        ?>



        <form class="col-md-4 offset-md-4" method="post" action=""> <!--POST va recuperer via le formulaire les données, method : comment vont circuler les données / action : url de destination-->
        <div class="form-group">
           <label for="email">Adresse Mail</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"> <!-- Il ne faut surtout pas oublier les attributs name sur le formulaire HTML, sinon aucune donnée saisie ne sera récupérée en PHP. On a fait l'exemple si il y aurait pas l'attribut name,en validant le formulaire l'attribut ne sera pas vu -->
    </div>
   <div class="form-group">
      <label for="mdp">Mot De Passe</label>
      <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>