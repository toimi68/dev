<?php
require_once('init.php');
extract($_POST);
$tab = array();

// --------REQUETE D'INSERTION' (requête AJAX 'aller') 


if(empty($prenom) || empty($nom) || empty($service) || empty($date_embauche) || empty($salaire))
{
        $tab['message'] = '<div class="col-md-6 offset-md-3 alert alert-danger text-center">Merci de remplir tout les champs du formulaire</div>'; 
}
else
{

  $result = $bdd->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$prenom', '$nom', '$sexe', '$service','$date_embauche', '$salaire')");

   $tab['message'] =  "<div class='col-md-6 offset-md-3 alert alert-success text-center'>L\'employé ' .$prenom . ' '. $nom . ' a bien été rajouter </div>";   


}

 
//--------DECLARATION DU TABLEAU  DES EMPLOYES APRES INSERTION (requête AJAX 'retour')

 $result = $bdd->query("SELECT DISTINCT service FROM employes");
 $tab['resultat'] = '<table class="table table-dark text-center"><tr>';
 for($i = 0; $i < $result->columnCount(); $i++)
 {
     $colonne = $result->getColumnMeta($i);
     $tab['resultat'] .= "<th>$colonne[name]</th>";
 }
$tab['resultat'] .= '</tr>';
while($employes = $result->fetch(PDO::FETCH_ASSOC))
{
        $tab['resultat'] .= '<tr>';
        foreach($employes as $value)
        {
                $tab['resultat'] .= "<td>$value</td>";
        }
        $tab['resultat'] .= '</tr>';
}
$tab['resultat'] .= '</table>';


 echo json_encode($tab);
