<?php
require_once 'connexion.php';

extract($_POST);
$tab=array();
$result = $bdd->query('SELECT * FROM produit');

$tab['resultat'] = '<table class="table">';
$tab['resultat'] .= '<tr>';

    for($i = 0; $i < $result->columnCount(); $i++)
    {
        $column = $result->getColumnMeta($i);
        $tab['resultat'] .= "<th>$column[name]</th>";
     //   $tab['resultat'] .= '<th> .'$colonne[name] .'</th>' c'est la même chose
    }
$tab['resultat'] .= '</tr>';
while($produit = $result->fetch(PDO::FETCH_ASSOC)) : // ':' remplace'{'
    $tab['resultat'] .= '<tr>';
    {
        foreach($produit as $values){
            $tab['resultat'] .= "<td>$values</td>";
        }
    }
    $tab['resultat'] .= '<tr>';
endwhile; // remplace le '}'
   
$tab['resultat'] .= '</table>';

echo json_encode($tab);