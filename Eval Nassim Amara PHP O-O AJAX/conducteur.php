<?php

// Initialisation variables.
$contenu = '';

$suppressionErreur = '<div class="alert alert-danger">La suppression n\'est pas autorisé tant qu\'il y a une relation associé dans la table <a href="?page=emprunt">emprunt</a></div>'; 
$suppressionValide = '<div class="alert alert-success">L\'élément a bien été supprimé</div>';

$enregistrementErreur = '<div class="alert alert-danger">L\'enregistrement n\'est pas autorisé tant qu\'il y a une relation associé dans la table <a href="?page=emprunt">emprunt</a></div>'; 
$enregistrementValide = '<div class="alert alert-success">L\'élément a bien été enregistré</div>';
//------------------------------------------------------------------------------------------
// Enregistrement : 
if($_POST)
{
    if(isset($_POST['id_conducteur'])) $id_conducteur = $_POST['id_conducteur']
    { 
    else $id_conducteur = ''; 
    }
    $resultat = $bdd->query("REPLACE INTO conducteur (id_conducteur,prenom,nom) VALUES('$id_conducteur', '$_POST[prenom]' '$_POST[nom]')");
}
// SUPRESSION:
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	$resultat = $mysqli->query("DELETE FROM conducteur WHERE id_conducteur=$_GET[id_conducteur]");
	if(!empty($bdd->error)) $contenu .= $suppressionErreur;
    else
     $contenu .= $suppressionValide;
	$_GET['action'] = '';
}
// Message:
if(isset($_GET['enregistrement']))
{
	if($_GET['enregistrement'] == 'valide')	 $contenu .= $enregistrementValide;
	else $contenu .= $enregistrementErreur;
}
//----------------------------------------------------------------------------------------------------------
// Affichage:
	$resultat = $bdd->query("SELECT * FROM conducteur");
	$contenu .= '<table class="table">';
	$contenu .= '<tr>';
	while($affichage_champs_conducteur = $resultat->fetch_field())
	{
		$contenu .= '<th>' . $affichage_champs_conducteur->name . '</th>';
	}
	$contenu .= '<th>modification</th>';
	$contenu .= '<th>suppression</th>';
	$contenu .= '</tr>';
	while($affichage_conducteur = $resultat->fetch_assoc())
	{
		$contenu .= '<tr>';
		foreach($affichage_conducteur as $indice => $valeur )
		{
			$contenu .= '<td>' . $valeur . '</td>';
		}
		$contenu .= '<td><a href="?page=abonne&action=modification&id_abonne='.$affichage_conducteur['id_conducteur'].'"></a></td>';
		$contenu .= '<td><a href="?page=abonne&action=suppression&id_abonne='.$affichage_conducteur['id_conducteur'].'"></a></td>';
		$contenu .= '</tr>';
	}
	$contenu .= '</table>';
//----------------------------------------------------------------------------------------------------------
// Ajout/Modif
$modif = false;
$contenu .= '<form method="post" action="">
 <div class="form-group">';
if(isset($_GET['action']) && $_GET['action'] == 'modification')
{
	$modif = true;
	$resultat = $bdd->query("SELECT * FROM conducteur WHERE id_conducteur = $_GET[id_conducteur]");
	$abonne = $resultat->fetch_assoc();
	$contenu .= '<input type="hidden" name="id_conducteur" value="' . $conducteur['id_conducteur'] . '">'; 
}
$contenu .= '<label for="prenom">Prenom</label>
	<input type="text" name="prenom" id="prenom" class="form-control" placeholder="prenom"';
	if($modif) $contenu .= " value=\"$conducteur[prenom]\"";
	$contenu .= '><br>';
	
	$contenu .= '<input type="submit" value="';
		if($modif) $contenu .= 'Modification';
		else $contenu .= 'Ajouter';
	$contenu .= '" class="btn btn-default">
</div>
</form>';