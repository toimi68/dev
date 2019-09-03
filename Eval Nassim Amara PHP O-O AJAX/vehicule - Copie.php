<?php

// Initialisation des variables.
$contenu = '';

$suppressionErreur = '<div class="alert alert-danger">La suppression n\'est pas autorisé tant qu\'il y a une relation associé dans la table <a href="?page=emprunt">emprunt</a></div>'; 
$suppressionValide = '<div class="alert alert-success">L\'élément a bien été supprimé</div>';

$enregistrementErreur = '<div class="alert alert-danger">L\'enregistrement n\'est pas autorisé tant qu\'il y a une relation associé dans la table <a href="?page=emprunt">emprunt</a></div>'; 
$enregistrementValide = '<div class="alert alert-success">L\'élément a bien été enregistré</div>';

// Enregistrement :
if($_POST)
{
    if(isset($_POST['id_association'])) $id_association = $_POST['id_association'];
     else $id_association = ''; 

    $resultat = $mysqli->query("REPLACE INTO vehicule (id_vehicule, marque, modele, couleur, immatriculation) VALUES ('$id_livre', '$_POST[marque]', '$_POST[modele]', '$_POST['couleur]', '$_POST['immatriculation]')");
    
}
// Suppression
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	$resultat = $bdd->query("DELETE FROM vehicule WHERE id_vehicule=$_GET[id_vehicule]");
	if(!empty($mysqli->error)) $contenu .= $suppressionErreur;
	else $contenu .= $suppressionValide;
	$_GET['action'] = '';
}
// message
if(isset($_GET['enregistrement']))
{
	if($_GET['enregistrement'] == 'valide')	 $contenu .= $enregistrementValide;
	else $contenu .= $enregistrementErreur;
}
// Affichage
	$resultat = $bdd->query("SELECT * FROM vehicule");
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
		foreach($affichage_vehicule as $indice => $valeur )
		{
			$contenu .= '<td>' . $valeur . '</td>';
		}
		$contenu .= '<td><a href="?page=vehicule=modification&id_livre='.$affichage_abonne['id_livre'].'"></a></td>';
		$contenu .= '<td><a href="?page=livre&action=suppression&id_livre='.$affichage_abonne['id_livre'].'"></a></td>';
		$contenu .= '</tr>';
	}
    $contenu .= '</table>';

// Ajout/Modif

$modif = false;
$contenu .= '<form method="post" action="">
 <div class="form-group">';
if(isset($_GET['action']) && $_GET['action'] == 'modification')
{
	$modif = true;
	$resultat = $bdd->query("SELECT * FROM vehicule WHERE id_vehicule = $_GET[id_vehicule]");
	$livre = $resultat->FETCH_ASSOC();
	$contenu .= '<input type="hidden" name="id_vehicule" value="' . $vehicule['id_vehicule'] . '">'; 
}
$contenu .= '<label for="auteur">Auteur</label>
	<input type="text" name="marque" id="marque" class="form-control" placeholder="auteur"';
	if($modif) $contenu .= " value=\"$vehicule[marque]\"";
	$contenu .= '><br>';
	
$contenu .= '<label for="titre">modele</label>
	<input type="text" name="modele" id="modele" class="form-control" placeholder="modele"';
	if($modif) $contenu .= " value=\"$vehicule[titre]\"";
    $contenu .= '><br>';
    
$contenu .= '<label for="titre">couleur</label>
	<input type="text" name="couleur" id="couleur" class="form-control" placeholder="couleur"';
	if($modif) $contenu .= " value=\"$vehicule[couleur]\"";
    $contenu .= '><br>';
    
$contenu .= '<label for="titre">immatriculation</label>
	<input type="text" name="immatriculation" id="immatriculation" class="form-control" placeholder="modele"';
	if($modif) $contenu .= " value=\"$vehicule[immatriculation]\"";
	$contenu .= '><br>';
	
	$contenu .= '<input type="submit" value="';
		if($modif) $contenu .= 'Modification';
		else $contenu .= 'Ajouter';
	$contenu .= '" class="btn btn-default">
</div>
</form>';
