    <?php
    require_once('init.php');
    extract($_POST);
    $tab = array();

    // -------------- REQUETE DE SELECTEUR (aller)

if(empty($reference) || empty($categorie) || empty($titre) || empty($description) || empty($couleur) || empty($taille) || empty($public) || empty($photo) || empty($prix) || empty($stock))
{
        $tab['message'] = '<div class="col-md-6 offset-md-3 alert alert-danger text-center">Merci de remplir tout les champs du formulaire</div>'; 
}
else
{

  $result = $bdd->prepare("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES ('$reference', '$categorie', '$titre', '$description','$couleur', '$taille' , '$public', '$photo', '$prix', '$stock')");

   $tab['message'] =  "<div class='col-md-6 offset-md-3 alert alert-success text-center'>L\'employé ' .$prenom . ' '. $nom . ' a bien été rajouter </div>";   


}



//--------DECLARATION DU TABLEAU  DES PRODUIT APRES INSERTION (requête AJAX 'retour')
$resultat = $bdd->query("SELECT * FROM produit");
$tab['resultat'] = '<table class="table table-dark text-center"><tr>';
 for($i = 0; $i < $resultat->columnCount(); $i++)
 {
     $colonne = $resultat->getColumnMeta($i);
     $tab['resultat'] .= "<th>$colonne[name]</th>";
 }
$tab['resultat'] .= '</tr>';
while($produit = $resultat->fetch(PDO::FETCH_ASSOC))
{
        $tab['resultat'] .= '<tr>';
        foreach($produit as $value)
        {
                $tab['resultat'] .= "<td>$value</td>";
        }
        $tab['resultat'] .= '</tr>';
}
$tab['resultat'] .= '</table>';


    echo json_encode($tab);