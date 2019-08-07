<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire 2</title>
</head>
<body>
     <!--
    1. Réaliser un formulaire HTML avec les champs suivants : pseudo, mdp, confirmer mdp, nom, prenom, email, sexe, téléphone , adresse , ville, code_postal et un bouton submit 

    2. Contrôler en PHP que l'on receptionne bien toute les données du formulaire

    3. Faites en sorte d'informer l'internaute si le pseudo n'est pas compris entre 2 et 20 caractères

    4. Faites en sorte d'informer l'internaute si les mots de passe ne sont pas identiques 

    5. Faites en sorte d'informer l'internaute si l'email n'est pas au bon format     

    6. Faites en sote d'informer l'internaute si le code postal n'est pas de type numérique (fonction prédéfinie : is_numeric) et si il est différent de 5 caracctères.

    7. Faites en sorte d'informer l'internaute si le champs nom est laissé vide.

    8. Faites en sorte d'informer l'internaute si le champ téléphone n'est pas valide (indice: expression régulière -> fonction prédéfinie preg_match())

    9. Faites en sorte d'informer l'internaute si il a correctement rempli le formulaire

    -->
       
  
        <h1 class="display-4 text-center">Formulaire 2</h1><hr>

        <?php

         // 2 :   

        echo  '<pre>'; print_r($_POST); echo '</pre>';
  
          $error = ''; // on déclarer une variable error à vide,qui va me stocker chaque message d'erreur
        
        if($_POST)// si on valide le formulaire, on entre dans le IF
        {
          

         // 3 : 
                    if(iconv_strlen($_POST['pseudo']) <2 || iconv_strlen($_POST['pseudo']) > 20)
                     {
                           $error .=  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 2 et 20 caractères !! </div>';
                    }

        

         // 4 :

         //Si la valeur du champs mot de passe est différent du champ mot de passe confirm,alors on entre dans les accolades du IF
       
                if($_POST['mdp'] !== $_POST['confirmer_mdp'])
                
                $error .=  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le mot de passe est incorrecte !! </div>' ;

                

         // 5 : 
         // si le champs 'email' n'est pas (!) au bon format alors on entre dans les accolades du IF
             if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // on va dans la case email,du formulaire avec _post['email']
             { 
                $error .=  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Email non valide !! </div>' ;
            }
         // 6 :
         // si la taille du champ 'code_postal' est différent de 5 caractère ou si le champ n'est pas de type numérique, alors on entre dans les accolades du IF
            if(iconv_strlen($_POST['code_postal']) !==5 || !is_numeric($_POST['code_postal']))
            {
                $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Code Postal non valide !! </div>' ;
            }
            
         //  7 : 
           
            // si le champ 'nom' est vide, alors on entre dans la condition
           if(empty($_POST['nom'])) // isset teste l'existence d'une variable
           
                {
                $error .=  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le champ nom est obligatoire</div>' ;
                }
                
        
         //  8 :

                if(!preg_match('#^[0-9]{10}+$#', $_POST['telephone'])) // debut et fin de chaine de caractère c le '#' on lui dit entre accolade 10 caractère,et le + c'est pour dire qu'il peut l'utiliser plusieurs fois
                {
                    $error .=  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Téléphone non valide, caractères non autorisés !! </div>' ;
                }

         /*
                preg_match() : une expression régulière (regex) est tjs entouré de dieze afin de préciser les options 
                ^ indique le début d'une chaine 
                $ indique la fin de la chaine
                + est la pour dire que les caractères peuvent être utilisés plusieurs fois
        */
         echo $error; // on fait une echo de $error pour afficher les messages d'erreurs

         //9: 
         if(empty($error))
         {
             echo '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Inscription validé !! </div>';
         }

                /*
                On stock tout les message d'erreurs dans la variable '$error', si cette variable est video, cela veut dire que nous ne sommes enrer ds aucune des conditions IF, donc que l'internanute a bien rempli les champs  contrôlés, on affiche donc un mesasge de validation
                */
        
        }
           ?>
    


        <form class="col-md-4 offset-md-4" method="post" action="">

        <div class="form-group">
           <label for="pseudo">pseudo</label>
          <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo"> 
        </div>
        
   <div class="form-group">
      <label for="mdp">Mot De Passe</label>
      <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Password">
  </div>

    <div class="form-group">
      <label for="confirmer_mdp">Confirmer mot de passe</label>
      <input type="text" class="form-control" id="confirmer_mdp" name="confirmer_mdp" placeholder="Enter Password">
  </div>

        <div class="form-group">
    <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" placeholder="nom" name="nom" >
        </div>

   <div class="form-group">
      <label for="prenom">prenom</label>
      <input type="text" class="form-control" id="prenom" placeholder="prenom"  name="prenom">
        </div>

        <div class="form-group">
           <label for="email">Adresse Mail</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"> 
        </div>

   <div class="form-group">
      <label for="sexe">Genre</label>
      <select class="form-control" id="sexe" name="sexe">
          <option value="m">HOMME</option>
          <option value="f">FEMME</option>
        </select>
  </div>

  <div class="form-group">
      <label for="telephone">Telephone</label>
      <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Entrer telephone">
  </div>

  <div class="form-group">
      <label for="adresse">Adresse</label>
      <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrer Adresse" >
  </div>

  <div class="form-group">
      <label for="Ville">Ville</label>
      <input type="text" class="form-control" id="ville" name="ville" placeholder="Entrer votre ville">
  </div>

       <div class="form-group col-mb-3">
      <label for="code_postal">Code postal</label>
      <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="code_postal">
</div>


  <button type="submit" class="btn btn-primary">Submit</button>

</form>
    
</body>
</html>