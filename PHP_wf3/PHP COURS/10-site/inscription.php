<?php 
require_once("include/init.php");
extract($_POST); // $_POST['pseudo'] --> $pseudo

if(internauteEstConnecte()) // Si l'internaute est connecté, il n'a rien à faire sur la page inscription, on le redirige vers sa page profil
{
    header("Location: profil.php");
}

// Exo 2 : 
//echo '<pre>'; print_r($_POST); echo '</pre>';

// Exo 3 :
if($_POST) // si on valide le formaulaire, on entre dans le IF
{
    // ---------- CONTROLE PSEUDO --------------//

    // on selectionne tout dans la BDD a condition que la colonne 'pseudo' de la table 'membre' soit égale à la donnée saisie dans le chamsp pseudo du formulaire
    $verif_pseudo = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
    $verif_pseudo->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $verif_pseudo->execute();
    // si le resultat de la requete est supérieur à 0, cela veut dire qu'un pseudo est bien existant en BDD, alors on affiche un message d'erreur

    if($verif_pseudo->rowCount() > 0)
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le pseudo <strong>' . $pseudo . '</strong> est déja existant en BDD. Merci d\'en saisir un nouveau !!</div>';
    }
    
    //-------------- CONTROLE MDP --------------//
    if($mdp !== $mdp_confirm)
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Merci de vérifier les mots de passe !!</div>';
    }

    // Exo : si l'internaute a bien rempli le formulaire, cela veut dire qu'il n'est passé dans aucune des conditions IF donc la varaible $error est vide, nous pouvons donc executer le traitement de l'insertion (requete préparée)
    if(!$error)
    {
        //$_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // on ne conserve jamais en cliar les mots de passe dans la BDD, password_hash permet  de créer une clé de hachage

        $data_insert = $bdd->prepare("INSERT INTO membre
        (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse)");

        foreach($_POST as $key => $value)
        {
            if($key != 'mdp_confirm')
            {
                $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
                //$data_insert->bindValue(":pseudo", 'GregFormateur', PDO::PARAM_STR);
                //$data_insert->bindValue(":nom", 'LACROIX',PDO::PARAM_STR);
            }
        }
        $data_insert->execute();

        header("Location:connexion.php?action=validate"); // header() -> fonction prédéfinie qui permet d'effectuer une redirection de page / URL
    }
} 


require_once("include/header.php"); 
?>

<!-- 
1. Créer un formulaire HTML correspondant à la table membre de la BDD 'site' (sauf id_membre et statut), ajouter le champs 'confirmer mot de passe'
2. Contrôler en PHP que l'on receptionne bien toute les données du formulaire ($_POST)
3. Contrôler la disponibilité du pseudo
4. Faites en sorte d'informer l'internaute si les mdp ne sont pas identiques
-->
<h1 class="display-4 text-center">INSCRIPTION</h1><hr>
<?= $error ?>
<form method="post" action="" class="col-md-6 offset-md-3 form1">
<div class="form-group">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter Pseudo">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="mdp">Mot de passe</label>
    <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Enter Mot de passe">
    </div>
    <div class="form-group col-md-6">
    <label for="mdp_confirm">Confirmer mot de passe</label>
    <input type="text" class="form-control" id="mdp_confirm" name="mdp_confirm" placeholder="Confirm mot de passe">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter nom">
    </div>
    <div class="form-group col-md-6">
    <label for="prenom">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter prenom">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-group col-md-6">
    <label for="civilite">Civilité</label>
    <select id="civilite" class="form-control" name="civilite">
        <option selected>Choose...</option>
        <option value="m">Monsieur</option>
        <option value="f">Madame</option>
    </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="ville">Ville</label>
    <input type="text" class="form-control" id="ville" name="ville" placeholder="Enter ville">
    </div>
    <div class="form-group col-md-6">
    <label for="code_postal">Code Postal</label>
    <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Enter code postal">
    </div>
</div>
<div class="form-group">
    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Enter adresse">
</div>
<button type="submit" class="btn btn-dark">Inscription</button>
</form>

<?php 
require_once("include/footer.php"); 
?>