<?php
require_once('init.php');
extract($_POST);
$tab = array();

// ----------- REQUETE DE SUPPRESSION -----------
// requete test :
// $result = $bdd->exec("DELETE FROM employes WHERE id_employes = 990");
// echo $result;
 $result = $bdd->exec("DELETE FROM employes WHERE id_employes = '$id'");

$tab['message'] = "<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé n° <strong>$id</strong> a bien été supprimer !! </div>"; // on crée un nouvel indice dans le tableau ARRAY pour stocker un message de validation


 //---------DECLARATION DU SELECTEUR A JOUR---------------
$result = $bdd->query("SELECT * FROM employes");
$tab['resultat'] = '<div class="form-group">';
$tab['resultat'] .= '<select class="col-md-6 offset-md-3 mb-4 mt-4 form-control" id="personne" name="personne">';
while ($employes = $result->fetch(PDO::FETCH_ASSOC))
{
    // echo '<pre>'; var_dump($result) ; echo '</pre>';
    $tab['resultat'] .= "<option value='$employes[id_employes]'>$employes[nom]</option>";

}
  
$tab['resultat'] .= '</select>';
$tab['resultat'] .= '</div>'; // .=vaut echo

echo json_encode($tab);