<?php
require_once("include/init.php");
require_once("include/header.php");

/*
    EXO : 
    1. Réaliser le requete permettant de selectionner le produit par rapport à l'id_produit envoyé dans l'URL
    2. Associer une méthode pour rendre le résultat exploitable
    3. Créer une fiche produit avec les informations du produit : photo / catégorie / titre / description / couleur / taille / prix / public / selecteur quantité / et un bouton d'ajout au panier
*/

if(isset($_GET['id_produit'])): // si l'indice 'id_produit' est définit dans l'URL

    $resultat = $bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
    $resultat->bindValue(':id_produit', $_GET['id_produit'], PDO::PARAM_INT);
    $resultat->execute();
    $produit = $resultat->fetch(PDO::FETCH_ASSOC);
    //echo '<pre>'; print_r($produit); echo '</pre>';

?>
<h1 class="display-4 text-center mt-4">DETAIL DU PRODUIT <strong class="text-info"><?= strtoupper($produit['titre']) ?></strong></h1>
<div class="col-lg-6 col-md-12 mx-auto form1">
<div class="card h-100">
   
    <a href=""><img class="card-img-top" src="<?= $produit['photo'] ?>" alt="<?= $produit['titre'] ?>"></a>
   
    <div class="card-body text-center">
    <h4 class="card-title text-center">
        <a href="" class="alert-link text-info"><?= $produit['titre'] ?></a>
    </h4><hr>
    <h5 class="text-center"><?= $produit['prix'] ?> €</h5><hr>
    <p class="card-text text-center"><?= $produit['description'] ?></p><hr>
    <p class="card-text text-center"><?= $produit['taille'] ?></p><hr>
    <p class="card-text text-center"><?= $produit['public'] ?></p><hr>
    <p class="card-text text-center"><?= $produit['couleur'] ?></p><hr>
    <a href="boutique.php?categorie=<?= $produit['categorie'] ?>" class="alert-link text-dark card-text"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;retour vers la catégorie <?= $produit['categorie'] ?></a>
    </div>
    <div class="card-footer text-center">
    <button type="button" class="col-md-12 btn btn-dark">Ajouter au panier</button>
    </div>
    
</div>
</div>

<?php
else: // si l'indice 'id_produit' n'est pas définit dans l'URL, on redirige vers la boutique
    header("Location: boutique.php");
endif;
require_once("include/footer.php");