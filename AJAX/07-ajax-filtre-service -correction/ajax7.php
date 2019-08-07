<?php
require_once('init.php');
extract($_POST);
$tab = array();

// --------REQUETE DE SELECTION (requête AJAX 'aller') 

$result = $bdd->query("SELECT * FROM employes WHERE service = '$service'");
 
//--------DECLARATION DU TABLEAU  DES EMPLOYES APRES INSERTION (requête AJAX 'retour')

//  $result = $bdd->query("SELECT DISTINCT service FROM employes");
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
