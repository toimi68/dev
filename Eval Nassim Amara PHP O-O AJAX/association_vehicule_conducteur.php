<?php
// Initialisation variables.
$contenu = '';

$suppressionErreur = '<div class="alert alert-danger">La suppression n\'est pas autorisé tant qu\'il y a une relation associé dans la table <a href="?page=emprunt">emprunt</a></div>'; 
$suppressionValide = '<div class="alert alert-success">L\'élément a bien été supprimé</div>';

$enregistrementErreur = '<div class="alert alert-danger">L\'enregistrement n\'est pas autorisé tant qu\'il y a une relation associé dans la table <a href="?page=emprunt">emprunt</a></div>'; 
$enregistrementValide = '<div class="alert alert-success">L\'élément a bien été enregistré</div>';

// Enregistrement :
if($_POST)
{
	$_POST['id_vehicule'] = str_replace('/', '-', $_POST['id_vehicule']);
	$_POST['id_conducteur'] = str_replace('/', '-', $_POST['id_conducteur']);
	if(isset($_POST['id_vehicule'])) $id_vehicule = $_POST['id_conducteur']; else $id_conducteur = ''; 
	$resultat = $bdd->query("REPLACE INTO association_vehicule_conducteur (id_vehicule, id_conducteur) VALUES ('$id_vehicule', '$_POST[id_conducteur]')");
}

// Suppression
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	$resultat = $bdd->query("DELETE FROM association_vehicule_conducteur  WHERE id_vehicule=$_GET[id_vehicule]");
	if(!empty($bdd->error)) $contenu .= $suppressionErreur;
	else $contenu .= $suppressionValide;
	$_GET['action'] = '';
}

// Message
if(isset($_GET['enregistrement']))
{
	if($_GET['enregistrement'] == 'valide')	 $contenu .= $enregistrementValide;
	else $contenu .= $enregistrementErreur;
}

// Affichage
	$resultat = $bdd->query("SELECT * FROM association_vehicule_conducteur ");
	$contenu .= '<table class="table">';
	$contenu .= '<tr>';
	while($affichage_champs_vehicule = $resultat->fetch_field())
	{
		$contenu .= '<th>' . $affichage_champs_vehicule->name . '</th>';
	}
	$contenu .= '<th>modification</th>';
	$contenu .= '<th>suppression</th>';
	$contenu .= '</tr>';
	while($affichage_vehicule = $resultat->FETCH_ASSOC())
	{
		$contenu .= '<tr>';
		foreach($affichage_vehicule $indice => $valeur )
		{
			$contenu .= '<td>' . $valeur . '</td>';
		}
		$contenu .= '<td><a href="?page=vehiculet&action=modification&id_emprunt='.$affichage_vehicule['id_vehicule'].'"></a></td>';
		$contenu .= '<td><a href="?page=vehicule&action=suppression&id_emprunt='.$affichage_vehicule['id_vehicule'].'"></a></td>';
		$contenu .= '</tr>';
	}
	$contenu .= '</table>';

// Ajout/Modif
$modif = false;
$contenu .= '<form method="post" action="">	<div class="form-group">';
if(isset($_GET['action']) && $_GET['action'] == 'modification')
{
	$modif = true;
	$resultat = $bdd->query("SELECT * FROM association_vehicule_conducteur  WHERE id_association_vehicule_conducteur = $_GET[id_association_vehicule_conducteur]");
	$emprunt = $resultat->FETCH_ASSOC();
	$contenu .= '<input type="hidden" name="id_association_vehicule_conducteur" value="' . $association_vehicule_conducteur['id_association_vehicule_conducteur'] . '">'; 
}
	$contenu .= '<label for="conducteur">conducteur</label><br>	
		<select name="id_conducteur">';
		$resultat = $bdd->query("SELECT * FROM association_vehicule_conducteur");
		while($abonnes = $resultat->fetch_assoc())
		{ 
			$contenu .= "<option value=\"$abonnes[id_association_vehicule_conducteur]\"";
			if($modif && $association_vehicule_conducteur['id_association_vehicule_conducteur'] == $emprunt['id_association_vehicule_conducteur']) $contenu .= ' selected';
			$contenu .= ">$abonnes[id_association_vehicule_conducteur] - $abonnes[conducteur]</option>"; 
		}
		$contenu .= '</select><br><br>
		
	<label for="vehicule">vehicule</label><br>
	<select name="id_vehicule">';
	$resultat = $bdd->query("SELECT * FROM association_vehicule_conducteur");
	while($vehicule = $resultat->fetch_ASSOC())
	{ 
		$contenu .= "<option value=\"$association_vehicule_conducteur[id_association_vehicule_conducteur]\"";
		if($modif && $association_vehicule_conducteur['id_association_vehicule_conducteur'] == $association_vehicule_conducteur['id_association_vehicule_conducteur']) $contenu .= ' selected';
		$contenu .= ">$association_vehicule_conducteur[id_association_vehicule_conducteur] -  $association_vehicule_conducteur[conducteur]  | $association_vehicule_conducteur[conducteur]</option>"; 
	}
	$contenu .= '</select><br><br>';
		
	$contenu .= '<input type="submit" value="';
		if($modif) $contenu .= 'Modification';
		else $contenu .= 'Ajouter';
	$contenu .= '" class="btn btn-default">
</div>
</form>';