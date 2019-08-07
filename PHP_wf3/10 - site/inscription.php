<?php
require_once("include/init.php");
extract($_POST); // $_POST['pseudo'] --> $pseudo

if(internauteEstConnecte()) // si l'internaute est connecté,il n'a rien à faire sur la page connexion,on le redirige vers sa page profil
{
    header("Location: profil.php");
}


// 2 .
// echo '<pre>'; print_r($_POST); echo '</pre>';




// 3. contrôle pseudo

if($_POST) // si on valide le formulaire,on entre dans le IF
{


// on selectionne tout dans la BDD a condition que la colonne 'pseudo' de la table 'membre' soit égale à la donnée saisie dans le champs pseudo du formulaire
$verif_pseudo = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
$verif_pseudo->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$verif_pseudo->execute();
// si le résultat de la requête est supérieur à 0, cela veut dire qu'un pseudo est bien existant en BDD, alors on affiche un message d'erreur
if($verif_pseudo->rowCount() > 0)
{
    $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le pseudo ' .$pseudo . ' est deja existant en BDD. Merci d\'en saisir un nouveau !! </div>';
}

// 4. ------------------------------- MDP   ------------------------------

         //Si la valeur du champs mot de passe est différent du champ mot de passe confirm,alors on entre dans les accolades du IF
       
                if($mdp !== $confirm_mdp)
                
                $error .=  '<div class="col-md-6 offset-md-3 alert alert-danger"> Merci de vérifier les mot de passe !! </div>';


// Exo : Si l'internaut a bien rempli le formulaire,cela veut dire qu'il n'est passé dans aucune des contitions IF donc la variable $error est vide, nous pouvons donc executer le traitement de l'insertion (requête preparée)
    if(!$error) // si y'a pas d'erreur
    {

  $_POST['mdp'] = password_hash($mdp, PASSWORD_DEFAULT); // PASSWORD_default est un type de cryptage. On ne conserve jamais en clair les mots de passe dans la BDD, password_hash permet de créer une clé de hachage
  


        $data_insert = $bdd->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse)");

        foreach($_POST as $key => $value)
        {
            if($key != 'confirm_mdp')
            {

               $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
               // $data_insert->bindValue(":pseudo", 'GregFormateur', PDO::PARAM_STR);
               //$data_insert->bindValue(":nom", 'LACROIX, PDO::PARAM_STR);
            }
        }
        $data_insert->execute();
        
        header("Location:connexion.php?action=validate");// header ()-> fonction prédéfinie qui permet d'éffectuer une redirection de page / URL
    }

}

require_once("include/header.php");
?>

<!--
    1. Créer un formulaire HTML correspondant à la table membre de la BDD 'site' (sauf id_membre et statut), ajouter le champs 'confirmer mot de passe'
    2. Contrôler en PHP que l'on receptionne bien toute les données du formulaire
    3. Contrôler la disponibilité du pseudo (requete à faire)
    4. Faites en sorte d'informer l'internaute si les mdp ne sont pas identiques

    
    -->
    <h1 class="display-4 text-center">INSCRIPTION</h1>
    <?= $error ?>
    <form method="post"  action ="" class="col-md-6 offset-md-3 ">
    

                         <!-- pseudo -->
    <div class="form-group">
      <label for="pseudo">Pseudo</label>
      <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter Pseudo">
    </div>
                         <!-- mdp sur la meme ligne,avec form-row -->
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="mdp">Mot de Passe</label>
      <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Enter Mot de passe">
    </div>
                         <!-- confirmer mdp -->
    <div class="form-group col-md-6">
     <label for="inputAddress">Confirmer mot de passe</label>
     <input type="text" class="form-control" id="confirm_mdp" name="confirm_mdp"  placeholder="Confirmer mdp">
    </div>
    </div>   <!-- fin de la div form-row -->

                         <!-- nom sur meme ligne form-row-->
    <div class="form-row">
    <div class="form-group col-md-6">
     <label for="nom">nom</label>
     <input type="text" class="form-control" id="nom"   name="nom" placeholder="nom">
    </div>
                         <!-- prenom -->
    <div class="form-group col-md-6">
     <label for="nom">Prenom</label>
     <input type="text" class="form-control" id="prenom"  name="prenom" placeholder="prenom">
    </div>
    </div> <!-- fermeture de la div form-row -->

                         <!-- email -->
                   
    <div class="form-group ">
     <label for="email">Adresse Mail</label>
     <input type="text" class="form-control" id="email" name="email" placeholder="email"> 
    </div>
                         <!-- civilite -->
    <div class="form-group">
     <label for="civilite">Civilité</label>
     <select class="form-control" id="civilite" name="civilite" placeholder="civilité">
         <option value="m">HOMME</option>
         <option value="f">FEMME</option>
        </select>
    </div> 

                          <!-- ville avec div form-row -->
     <div class="form-row">
     <div class="form-group col-md-6">
      <label for="ville">Ville</label>
      <input type="text" class="form-control" id="ville" name="ville" placeholder="ville" >
     </div>
                          <!-- code postal -->

    <div class="form-group col-md-6">
      <label for="code_postal">Code postal</label>
      <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="code postal">
    </div>
    </div>

                          <!-- adresse -->
    <div class="form-group">
      <label for="adresse">Adresse</label>
      <input type="text" class="form-control" id="champ" name="adresse" placeholder="adresse">
  </div>

                          <!-- bouton inscription-->
   <button type="submit" class="btn btn-primary">Inscription</button>






<?php
require_once("include/footer.php");
?>


