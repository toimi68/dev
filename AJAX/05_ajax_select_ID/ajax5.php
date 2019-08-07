    <?php
    require_once('init.php');
    extract($_POST);
    $tab = array();

// -------------- REQUETE DE SELECTEUR (aller)

$result = $bdd->query("SELECT * FROM employes WHERE id_employes = $id");

// ------------- DECLARATION TABLEAU (retour)
$tab['resultat'] = '<table class="table table-dark text-center"><tr>';
for($i = 0; $i < $result->columnCount(); $i++)
{
    $colonne = $result->getColumnMeta($i);
    $tab['resultat'] .= "<th>$colonne[name]</th>";
}
$tab['resultat'] .= '</tr>';

// réaliser le traitement PHP permettant d'afficher les données de l'employé 509

$employes = $result->fetch(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($employes); echo '</pre>';
foreach($employes as $value)
{
    $tab['resultat'] .="<td>$value</td>";
}


$tab['resultat'] .= '</table>';

// require_once('init.php');
// extract($_POST);
// $tab = array();

// $result = $bdd->query("SELECT * FROM employes");
// $tab['resultat'] = '<div class="form-group">';
// $tab['resultat'] .= '<select class="form-control" id="personne" name ="personne">';




// while($employes = $result->fetch(PDO::FETCH_ASSOC))
// {
//     $tab['resultat'] .= "<option value='$employes[id_employes]'>$employes[nom]</option>";
    
// }
// $tab['resultat'] .= '</select>';
// $tab['resultat'] .= '</div>';
// // echo '<pre>'; print_r($tab); echo '</pre>';

// $resulttab = $bdd->query("SELECT * FROM employes WHERE id = '$id'");

// $tab['resultat'] = '<table class="col-md-6 mx-auto table table-dark text-center"><tr>';
// for($i = 0; $i < $resulttab->columnCount(); $i++)
// {
//     $colonne = $result->getColumnMeta($i);
//     $tab['resultat'] .= "<th>$colonne[name]</th>";
// }
// $tab['resultat'] .= "</tr><tr></tr>";

// $employes = $resulttab->fetch(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($resulttab); echo '</pre>';
// foreach($employes as $value)
// {
//     $tab['resultat'] .="<td>$value</td>";
// }


echo json_encode($tab);