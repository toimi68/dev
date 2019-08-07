<?php
require_once('init.php');
extract($_POST);
$tab = array();
//requete test
// $result = $bdd->query("INSERT INTO employes (prenom) VALUES ('Alicia')");

// Bonne requete
if(!empty($personne))
{
  $result = $bdd->query("INSERT INTO employes (prenom) VALUES ('$personne')");
  $tab['resultat'] = "<div class='col-md-6 offset-md-3 alert alert-success text-center'>Lemployé <strong>$personne</strong> a bien été enregistré</div>";   
}
else{

  $tab['resultat'] = "<div class='col-md-6 offset-md-3 alert alert-danger text-center'>Merci de saisir un prénom</div>";   
}
echo json_encode($tab);

// pour pouvoir véhiculer des données en http via une requete AJAX, nous devons encoder en JSON, c' est un format léger. C' est la réponse de la requete "retour" AJAX que l' on retrouve dans function(data) dans le fichier ajax2.js

 
?>