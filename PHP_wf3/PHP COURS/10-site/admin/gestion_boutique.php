<?php 
require_once('../include/init.php');
extract($_POST);
extract($_GET);

// Si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page connexion.php
if(!internauteEstConnecteEtEstAdmin())
{
    header("Location:" . URL . "connexion.php");
}

//----------- SUPPRESSION PRODUIT 
// on entre dans le IF seulement dans le cas où l'on a cliqué sur le bouton suppression
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
    // Exo : requete de suppression / requete préparée
    //echo 'suppression produit';
    $supp_prod = $bdd->prepare("DELETE FROM produit WHERE id_produit = :id_produit");
    $supp_prod->bindValue(':id_produit', $id_produit, PDO::PARAM_INT); // $id_produit fait reference à $_GET['id_produit'] (extract)
    $supp_prod->execute();

    $_GET['action'] = 'affichage'; // on redirige vers l'affichage des produits

    $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n° <strong>$id_produit</strong> a bien été supprimé !!</div>";
}

//----------- ENREGISTREMENT PRODUIT
if($_POST)
{
    $photo_bdd = '';
    if(isset($_GET['action']) && $_GET['action'] == 'modification')
    {
        $photo_bdd = $photo_actuelle; // si on soubhaite conserver la même photo en cas de modification, on affecte la valeur du champ photo 'hidden', c'est à dire l'URL de la photo selectionnée en BDD
    }

    if(!empty($_FILES['photo']['name'])) // on vérifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploder une photo
    {
        $nom_photo = $reference . '-' . $_FILES['photo']['name']; // on redéfinit le nom de la photo en concaténant le réference saisi dans le formulaire avec le nom de la photo
        //echo $nom_photo . '<br>';

        $photo_bdd = URL . "photo/$nom_photo"; // on définbit l'URL de la photo,c'est ce que l'on conservera en BDD
        //echo $photo_bdd . '<br>';

        $photo_dossier = RACINE_SITE . "photo/$nom_photo"; // on définit le chemin physique de la photo sur le disue dur du serveur, c'est ce qui nous permettra de copier la photo dans le dossier photo
        //echo $photo_dossier . '<br>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier); // copy() est une fonction prédéfinie qui permet de copierla photo dans le dossier photo . arguments : copy(nom_temporaire_photo, chemin de destination)
    }

    // Exo : Réaliser la requete d'insertion permettant d'insérer un produit dans la table 'produit' (requete préparée)
    
    if(isset($_GET['action']) && $_GET['action'] == 'ajout')
    {
        $data_insert = $bdd->prepare("INSERT INTO produit
        (reference,categorie,titre,description,couleur,taille,public,photo,prix,stock) VALUES (:reference,:categorie,:titre,:description,:couleur,:taille,:public,:photo,:prix,:stock)");

        $_GET['action'] = 'affichage';

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit référence <strong>$reference</strong> a bien été ajouté !!</div>"; 
    }
    else
    {
        // Exo : requete update
        $data_insert = $bdd->prepare("UPDATE produit SET reference = :reference,categorie = :categorie,titre = :titre,description= :description,couleur = :couleur,taille = :taille,public = :public,photo = :photo,prix = :prix,stock = :stock WHERE id_produit = $id_produit");
        
        $_GET['action'] = 'affichage';

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n° <strong>$id_produit</strong> a bien été modifié !!</div>"; 
    }
    
    foreach($_POST as $key => $value)
    {
        if($key != 'photo_actuelle') // on ejecte le champs 'hidden' de la photo
        {
            $data_insert->bindValue(":$key", $value, PDO::PARAM_STR); 
        } 
    }
    $data_insert->bindValue(":photo", $photo_bdd, PDO::PARAM_STR); 
    $data_insert->execute();

}


require_once('../include/header.php');
//echo '<pre>'; print_r($_POST);echo '</pre>';
// $_FILES : superglobale permet de véhiculer les informations d'un fichier uploader
//echo '<pre>'; print_r($_FILES);echo '</pre>';
?>

<!-- LIENS PRODUITS -->
<ul class="col-md-4 offset-md-4 list-group mt-4 text-center">
  <li class="list-group-item bg-dark text-center text-white"><h5>BACK OFFICE</h5></li>
  <li class="list-group-item"><a href="?action=affichage" class="alert-link text-dark">AFFICHAGE PRODUITS</a></li>
  <li class="list-group-item"><a href="?action=ajout" class="alert-link text-dark">AJOUT PRODUITS</a></li>
</ul><hr>
<!-- FINS LIENS PRODUITS -->

<!-- AFFICHAGE PRODUITS -->
<?php if(isset($_GET['action']) && $_GET['action'] == 'affichage'): ?>

<h1 class="display-4 text-center">LISTE DES PRODUITS</h1><hr>

<?php 
echo $validate;
$result = $bdd->query("SELECT * FROM produit");
$produits = $result->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>'; print_r($produits);echo '</pre>';
?>

<table class="table table-bordered text-center tab1"><tr>
<?php foreach($produits[0] as $key => $value): ?>
    <th><?= strtoupper($key) ?></th>
<?php endforeach; ?>
    <th>MODIFIER</th>
    <th>SUPPRIMER</th>
</tr>
<?php foreach($produits as $key => $tab): ?>
    <tr>
    <?php foreach($tab as $key2 => $value): ?>

        <?php if($key2 == 'photo'): ?>
            <td><img src="<?= $value ?>" alt="<?= $tab['titre'] ?>" class="card-img-top"></td>
        <?php else: ?>
            <td><?= $value ?></td>
        <?php endif; ?>

    <?php endforeach; ?> 

    <td><a href="?action=modification&id_produit=<?= $tab['id_produit'] ?>" class="text-dark"><i class="fas fa-edit"></i></a></td>

    <td><a href="?action=suppression&id_produit=<?= $tab['id_produit'] ?>" class="text-danger" onclick="return(confirm('En êtes vous certain ?'))"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
<?php endforeach; ?>
</table>

<?php endif; ?>
<!-- FIN AFFICHAGE PRODUITS -->

<?php if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')): ?>

<h1 class="display-4 text-center"><?= strtoupper($action) ?> D'UN PRODUIT</h1><hr>

<?php 
if(isset($_GET['id_produit']))
{
    $resultat = $bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
    $resultat->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
    $resultat->execute();

    $produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
    echo '<pre>'; print_r($produit_actuel); echo '</pre>';
}

$reference = (isset($produit_actuel['reference'])) ? $produit_actuel['reference'] : '';
$categorie = (isset($produit_actuel['categorie'])) ? $produit_actuel['categorie'] : '';
$titre = (isset($produit_actuel['titre'])) ? $produit_actuel['titre'] : '';
$description = (isset($produit_actuel['description'])) ? $produit_actuel['description'] : '';
$couleur = (isset($produit_actuel['couleur'])) ? $produit_actuel['couleur'] : '';
$taille = (isset($produit_actuel['taille'])) ? $produit_actuel['taille'] : '';
$public = (isset($produit_actuel['public'])) ? $produit_actuel['public'] : '';
$photo = (isset($produit_actuel['photo'])) ? $produit_actuel['photo'] : '';
$prix = (isset($produit_actuel['prix'])) ? $produit_actuel['prix'] : '';
$stock = (isset($produit_actuel['stock'])) ? $produit_actuel['stock'] : '';
?>

<form method="post" action="" class="col-md-6 offset-md-3 form1" enctype="multipart/form-data"><!-- enctype : obligatoire en PHP pour recolter les informations d'1 fichier uploadé -->
<div class="form-group">
    <label for="reference">Référence</label>
    <input type="text" class="form-control" id="reference" name="reference" placeholder="Enter reference" value="<?= $reference ?>">  
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="categorie">Catégorie</label>
    <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Enter categorie" value="<?= $categorie ?>">
    </div>
    <div class="form-group col-md-6">
    <label for="titre">Titre</label>
    <input type="text" class="form-control" id="titre" name="titre" placeholder="Enter titre" value="<?= $titre ?>">
    </div>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" value="<?= $description ?>">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="couleur">Couleur</label>
    <input type="text" class="form-control" id="couleur" name="couleur" placeholder="Enter couleur" value="<?= $couleur ?>">
    </div>
    <div class="form-group col-md-6">
    <label for="taille">Taille</label>
    <select id="taille" class="form-control" name="taille">
        <option>Choose...</option>
        <option value="s" <?php if($taille == 's') echo 'selected'; ?>>S</option>
        <option value="m" <?php if($taille == 'm') echo 'selected'; ?>>M</option>
        <option value="l" <?php if($taille == 'l') echo 'selected'; ?>>L</option>
        <option value="xl" <?php if($taille == 'xl') echo 'selected'; ?>>XL</option>
    </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="public">Public</label>
    <select id="public" class="form-control" name="public">
        <option>Choose...</option>
        <option value="m" <?php if($public == 'm') echo 'selected'; ?>>Homme</option>
        <option value="f" <?php if($public == 'f') echo 'selected'; ?>>Femme</option>
        <option value="mixte" <?php if($public == 'mixte') echo 'selected'; ?>>Mixte</option>
    </select>
    </div>
    <div class="form-group col-md-6">
    <label for="photo">Photo</label>
    <input type="file" class="form-control" id="photo" name="photo">
    </div>
    <?php if(!empty($photo)): ?>
        <em>Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</em><br>
        <img src="<?= $photo ?>" alt="<?= $titre ?>" class="card-img-top">
    <?php endif; ?>
    <input type="hidden" id="photo_actuelle" name="photo_actuelle" value="<?= $photo ?>">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="prix">Prix</label>
    <input type="text" class="form-control" id="prix" name="prix" placeholder="Enter prix" value="<?= $prix ?>">
    </div>
    <div class="form-group col-md-6">
    <label for="stock">Stock</label>
    <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter stock" value="<?= $stock ?>">
    </div>
</div>
<button type="submit" class="btn btn-dark"><?= $action ?></button>
</form>

<?php 
endif;
require_once('../include/footer.php');