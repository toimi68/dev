<?php
require_once('include/init.php');
extract($_POST);

if(internauteEstConnecte()) // Si l'internaute est connecté, il n'a rien à faire sur la page connexion, on le redirige vers sa page profil
{
    header("Location: profil.php");
}

// Si l'indice 'action' est définit dans l'URL et qu'il a comme valeur 'deconnexion', cela veut dire que l'on acliqué sur le lien 'deconnexion', du coup on supprime le fichier session
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
    session_destroy();
}

if(isset($_GET['action']) && $_GET['action'] == 'validate')
{
    $validate .= '<div class="col-md-6 offset-md-3 text-center alert alert-success">Félicitations !! vous êtes inscrit sur le site. Vous pouvez dès à présent vous connecter !!</div>';
}

//echo '<pre>'; print_r($_POST); echo '</pre>';

if($_POST)
{
    // On selectionne tout dans la table 'membre' à condition que la colonne pseudo ou email de la BDD soit bien égale au pseudo ou email saisie dans le formulaire
    $verif_pseudo_email = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo OR email = :email");
    $verif_pseudo_email->bindValue(':pseudo', $email_pseudo, PDO::PARAM_STR);
    $verif_pseudo_email->bindValue(':email', $email_pseudo, PDO::PARAM_STR);
    $verif_pseudo_email->execute();

    // Si le resultat de le requete de selection est supérieur à 0, cela veut dire que l'internaute a saisie un bon email ou bon pseudo, donc on entre dans le IF
    if($verif_pseudo_email->rowCount() > 0)
    {
        $membre = $verif_pseudo_email->fetch(PDO::FETCH_ASSOC); // on récupère les données en BDD de l'internaute qui a saisi le bon pseudo  ou le bon email, on va pouvoir comparer les mots de passe
        //echo '<pre>'; print_r($membre); echo '</pre>';

        // si le mot de passe de la BDD est égale au mot de passe que l'internaute a saisi dans le formulaire, on entre dans le IF
        // if(password_verify($mdp, $membre['mdp'])) / si on hache le mot de passe à l'inscription (password_hash) / password_verify permet de comparer une clé de hachage à une chaine de caractères

        // On entre dans le IF seulement dans le cas où l'interaute a saisi le bon email/pseudo et le bon mdp
        if($membre['mdp'] == $mdp)
        {
            // on passe en revue les données de l'internaute qui a saisi le bon email/pseudo et mdp
            foreach($membre as $key => $value)
            {
                if($key != 'mdp') // on exclu le mdp
                {
                    $_SESSION['membre'][$key] = $value; // pour chaque tour de boucle foreach, on enregistre les données de l'internaute dans son fichier session
                }
            }
            //echo '<pre>'; print_r($_SESSION); echo'</pre>';
            header("Location: profil.php"); // aprés enregistrement des données de l'internaute dans son fichier session, on le redirige vers sa page profil
        }
        else // on entre dans le ELSE dans le cas où l'internaute n'a pas saisi le bon mot de passe
        {
            $error .= '<div class="col-md-4 offset-md-4 text-center alert alert-danger"><strong>Vérifier le mot de passe !!!</strong></div>';
        }
    }
    else // on entre dans le ELSE si l'internaute n'a pas saisie le bon email ou le bon pseudo
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le pseudo ou email : <strong>' . $email_pseudo . '</strong> est inconnu en BDD !!</div>';
    }
}

require_once('include/header.php');
?>

<h1 class="display-4 text-center">CONNEXION</h1><hr>

<?= $validate ?>
<?= $error ?>
<!-- 
1. Réaliser un formulaire de connexion avec les champs suivants : email ou pseudo / mot de passe / bouton submit
2. Contrôler en PHP que l'on receptionne bien toute les données du formulaire
-->

<form method="post" action="" class="col-md-4 offset-md-4 text-center">
<div class="form-group">
    <label for="email_pseudo">Email ou Pseudo</label>
    <input type="text" class="form-control" id="email_pseudo" name="email_pseudo" placeholder="Enter email ou Pseudo">
</div>
<div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Password">
</div>
<button type="submit" class="col-md-12 btn btn-dark">Connexion</button>
</form>

<?php
require_once('include/footer.php');