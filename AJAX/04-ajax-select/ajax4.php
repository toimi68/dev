<?php
require_once('init.php');
extract($_POST); 
$tab = array();

 //---------REQUETE DE SELECTION A JOUR ---------------
$result = $bdd->query("SELECT * FROM employes WHERE prenom ='$prenom'");
// echo '<pre>'; var_dump($result); echo '</pre>';

//-------------DECLARATION DU TABLEAU (requête AJAX 'retour')

$tab['resultat'] ='<table class="table table-bordered"><tr>';
for($i = 0; $i < $result ->columnCount(); $i++)
{
    $colonne = $result->getColumnMeta($i);
    // echo '<pre>'; print_r($colonne); echo '</pre>';
    $tab['resultat'] .= "<th>$colonne[name]</th>";
}
$tab['resultat'] .= '</tr><tr>';

$employe = $result->fetch(PDO::FETCH_ASSOC);
// echo '<pre>'; var_dump($employe); echo '</pre>';
foreach($employe as $value)
{
    $tab['resultat'] .= "<td>$value</td>";
}
$tab['resultat'] .= '</tr></table>';

echo json_encode($tab);




