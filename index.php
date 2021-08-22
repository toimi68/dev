
<?php
extract($_POST);
// verification que je receptionne bien tous les champs de mon formulaire
// echo '<pre>'; print_r($_POST); echo '</pre>';
//---------CHEMIN
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . 'localhost/nouveau-dossier/repository-baillet/PHP/EVAL/' ); //lors de l'enregistrement d'image / photos, nous aurons besoin du chemin physique pour enregistrer la photo dans le bon dossier 
// echo RACINE_SITE; 
define("URL", "http://localhost/nouveau-dossier/repository-baillet/PHP/EVAL/");/* Cette constante servira a enregistrer  l'URL d'une photo / image dans la BDD. On ne conserve jamais la photo elle même, ce serait trop lourd pour la BDD */
//je créé une variable d'erreur par champ du formulaire qui s'affichera au dessus de chaque champ
$errorTitre = '';
$errorAddr = '';
$errorVille = '';
$errorCp = '';
$errorSurf = '';
$errorPrix = '';
$errorType = '';
$success ='';
foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags(trim($value));// 'strip_tags', supprime les balises HTML, et 'trim' supprime les espaces en debut et fin de chaine.
}
if($_POST)// condition permettant d'eviter les messages d'erreurs s'affichant tout de suite
{
        //photo    
        $photo_bdd='';
        if(!empty($_FILES['photos']['name']))/* on verifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploadé une photo */
            {
        $nom_photo = $titre . '-' . $_FILES['photos']['name'];/* on redefinie le nom de la photo en concaténant la référence saisie dans le formulaire avec le nom de la photo */
        $photo_bdd = URL . "img/$nom_photo";//URL est une constante, tout comme RACINE_SITE
        echo $photo_bdd . '<br>';
        $photo_dossier = RACINE_SITE . "img/$nom_photo";/* on définie l'URL de la photo, c'est ce que l'on conservera en BDD */
       
        copy($_FILES['img']['tmp_name'], $photo_dossier);/* la fonction predefinie copy() permet de copier la photo dans le dossier photo: arguments: nom temporaire de la photo, chemin de destination */
            }

            //message error titre
        if(empty($titre) || (iconv_strlen($titre) < 3 && iconv_strlen($titre) > 30))
        if(empty($titre) || (iconv_strlen($titre) > 3 && iconv_strlen($titre) < 30))
            {
                 $errorTitre .='<small class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">veuillez saisir un titre compris entre 3 et 30 caracteres</small>';
            }
            //message error adresse
        if(empty($adresse) || (iconv_strlen($adresse) < 3 && iconv_strlen($adresse) > 30))
        if(empty($adresse) || (iconv_strlen($adresse) > 3 && iconv_strlen($adresse) < 30))
            {
                 $errorAddr .='<small class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">veuillez saisir une adresse comprise entre 3 et 30 caracteres</small>';
            }
            //message error ville
        if(empty($ville) || (iconv_strlen($ville) < 3 && iconv_strlen($ville) > 30))
        if(empty($ville) || (iconv_strlen($ville) > 3 && iconv_strlen($ville) < 30))
            {
                 $errorVille .='<small class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">veuillez saisir une ville comprise entre 3 et 30 caracteres</small>';
            }
/*@@ -66,7 +66,7 @@*/
                 $errorCp .='<small class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">veuillez saisir un code postal valide à 5 chiffres</small>';
            }
            //message error surface
        if(empty($surface) || !is_numeric($surface) || (iconv_strlen($ville) < 1 && iconv_strlen($ville) > 3))
        if(empty($surface) || !is_numeric($surface) || (iconv_strlen($surface) < 1 && iconv_strlen($surface) > 3))
            {
                 $errorSurf .='<small class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">veuillez saisir une surface en chiffre comprise entre 1 et 3 caractères</small>';
            }    
/*@@ -76,7 +76,7 @@*/
                 $errorPrix .='<small class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">veuillez saisir un prix en chiffres</small>';
              
            //message error type
        if(empty($type) || (iconv_strlen($type) < 3 && iconv_strlen($type) > 30))
        if(empty($type) || (iconv_strlen($type) > 3 && iconv_strlen($type) < 30))
            {
                 $errorType .='<small class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">veuillez saisir un type existant</small>';
            }    
            //si toutes mes variables d'erreurs sont vides, je créé l'insertion en BDD et affiche le message de succes
        if(empty($errorTitre) && empty($errorAddr) && empty($errorVille) && empty($errorCp) && empty($errorSurf) && empty($errorPrix) && empty($errorType))   
            {
                
                //connexion a la base de données 'immobilier'
                $bdd = new PDO('mysql:host=localhost;dbname=immobilier','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                $nouvLogement = $bdd->prepare("INSERT INTO logement (titre , adresse , ville , cp , surface , prix , photos , type , description) VALUES (:titre , :adresse , :ville , :cp , :surface , :prix , :photos , :type , :description )");
                    foreach($_POST as $key => $value)// pour chaque ligne entrée dans le formulaire, on fait un bindvalue
                        {
                            if($key != 'photo_actuelle')
                            {
                                $nouvLogement->bindValue(":$key", $value, PDO::PARAM_STR);
                            }
                        $nouvLogement->bindValue(":photos", $photo_bdd, PDO::PARAM_STR);
                        }
                    $nouvLogement->execute(); 
                $success = '<small class="alert alert-success">Vous avez bien entré un nouveau logement dans la base de données</small></small>';    
            }
         
        
// fin du if($_POST)
?>
<!-- html -->
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>eval_PHP_logement</title>
  </head>
  <body>
  <!--  -->
    <h1 class="display-4 text-center">Insersion d'un logement</h1>
    <!-- Formulaire insersion logement - bootstrap -->
    <form class="col-md-6 offset-md-3" method="post" action="">
    <?=$success?>
  <div class="form-group">
    <label for="titre">Titre</label>
    <?= $errorTitre?>
    <input type="text" class="form-control col-md-12" id="titre" name="titre" placeholder="titre" require>
  </div> 
  <div class="form-group">
    <label for="Adresse">Adresse</label>
    <?= $errorAddr?>
    <input type="text" class="form-control col-md-12" id="adresse" name="adresse" placeholder="Adresse">
  </div>
  <div class="form-group">
    <label for="Ville">Ville</label>
    <?= $errorVille ?>
    <input type="text" class="form-control col-md-12" id="ville" name="ville" placeholder="Ville">
  </div>
  <div class="form-group">
    <label for="Code Postal">Code Postal</label>
    <?= $errorCp ?>
    <input type="text" class="form-control col-md-12" id="cp" name="cp" placeholder="Code Postal">
  </div> 
  <div class="form-group">
    <label for="surface">Surface</label>
    <?= $errorSurf ?>
    <input type="text" class="form-control col-md-12" id="surface" name="surface" placeholder="surface">
  </div>
  <div class="form-group">
    <label for="Prix">Prix</label>
    <?= $errorPrix ?>
    <input type="text" class="form-control col-md-12" id="prix" name="prix" placeholder="Prix">
  </div>
  <!-- photo -->
  <div class="form-group">
    <label for="exampleFormControlFile1">Charger une photo</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photos">
  </div>
  <input type="hidden" id=photo_actuelle name="photo_actuelle" value="<?=$photo?>">
  <!-- selecteur -->
  <div class="form-group">
    <label for="exampleFormControlSelect1">Type</label>
    <?= $errorType ?>
    <select class="form-control" id="exampleFormControlSelect1" name="type">
      <option value="vente">Vente</option>
      <option value="location">Location</option>
    </select>
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
  <button class="btn btn-success color-white col-md-6 offset-md-3"><a href="affichage_logements.php" action="">Afficher les differents logements</button> </a>
</form>
<!-- Fin formulaire -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>