<?php
require_once('../include/init.php'); // le '../' permet de sortir d'un fichier pour y revenir
extract($_POST);
extract($_GET);

// si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page connexion.php
// if(!internauteEstConnecteEtEstAdmin())
// {
//     header("Location:" . URL . "connexion.php");
// }

//---------------SUPPRESSION PRODUIT
// on entre dans le IF seulement dans le cas ou l'on a cliqué sur le bouton suppression
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
    //Exo: requête de suppression / requete préparée
    // echo 'supression produit';
    
    $data_delete = $bdd->prepare("DELETE FROM produit WHERE id_produit = :id_produit");  
    $data_delete->bindValue(':id_produit', $id_produit, PDO::PARAM_INT); // $id_produit fait référence à $_GET['id_produit'] (extract)
    $data_delete->execute();

    $_GET['action'] = 'affichage'; // on redirige vers l'affichage des produits 
 

    $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit N° <strong>$id_produit</strong> a bien été supprimer !! </div>";

}// fin requete suppression

//---------------ENREGISTREMENT PRODUIT
if($_POST)
{
    $photo_bdd = '';
    if(isset($_GET['action']) && $_GET['action'] == 'modification') // si dans l'url j'ai l'indice modification alors je clique sur modif et je rentre dans la condition....
    {
        $photo_bdd = $photo_actuelle; // si on souhaite conserver la même photo en cas de modification, on affecte la valeur du champ photo 'hidden', c'est à dire l'URL de la photo selectionnée en BDD,$hoto permet d'insérer l'url de la photo ds la bdd
    }

    if(!empty($_FILES['photo']['name'])) // on vérifie que l'indice 'name' dans la surperglobale $_FILES n'est pas vide, celà veut dire que l'on a bien uploader une photo
    {
        $nom_photo = $reference . '-' . $_FILES['photo']['name']; // on redéfinit le nom de la photo en concaténant la référence saisie dans le formulaire avec le nom de la photo
        echo $nom_photo . '<br>';

        $photo_bdd = URL . "photo/$nom_photo"; // on définit l'URL de la photo, c'est ce que l'on conservera en BDD
        echo $photo_bdd . ' <br>';

        $photo_dossier = RACINE_SITE  . "photo/$nom_photo"; // on définit le chemin physique de la photo sur le disque dur du serveur, c'est ce qui nous permettra de copier la photo dans le dossier PHOTO
        echo $photo_dossier . '<br>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier); // copy() est une fonction prédéfinie qui permet de copier la photo dans le dossier PHOTO 
        // arguments : copy(nom_temporaire_photo, chemin de destination)

    }

    // Exo : Réaliser la requete d'insertion permettant d'insérer un produit dans la table 'produit' (requete préparée)

    // Ajout Produit 
    if(isset($_GET['action']) && $_GET['action'] == 'ajout')
    {
    $data_insert = $bdd->prepare("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");

      $_GET['action'] = 'affichage';

       $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit référence <strong>$reference</strong> a bien été ajouté !! </div>";

    }
    else
    {   


        // exo : requete update

        $data_insert = $bdd->prepare("UPDATE  produit SET reference = :reference, categorie = :categorie, titre = :titre, description = :description, couleur = :couleur, taille = :taille, public = :public, photo = :photo, prix = :prix, stock = :stock WHERE id_produit = $id_produit");

        $_GET['action'] = 'affichage';

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit N° <strong>$id_produit</strong> a bien été modifier !! </div>";
    }



    foreach($_POST as $key => $value)
    {
         if($key != 'photo_actuelle')
         {
               $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
         }
    }
    $data_insert->bindValue(":photo", $photo_bdd, PDO::PARAM_STR);
    $data_insert->execute();

}

require_once('../include/header.php'); // le '../' permet de sortir d'un fichier pour y revenir
echo '<pre>'; print_r($_POST); echo'</pre>';
// $_FILES: superglobale qui permet de véhiculer les informations d'un fichier uploader
///echo '<pre>'; print_r($_FILES); echo'</pre>';
?>

<!-- LIENS PRODUITS -->

<ul class="col-md-4 offset-md-4 list-group md-4 text-center">
  <li class="list-group-item bg-dark text-center text-while"><h5>BACK OFFICE</h5></li>
  <li class="list-group-item"><a href="?action=affichage" class="alert-link text-dark">AFFICHAGE PRODUITS</a></li>
  <li class="list-group-item"><a href="?action=ajout" class="alert-link text-dark">AJOUT PRODUITS</a></li>
</ul>

<!-- FIN LIENS PRODUITS  -->

<!-- AFFICHAGE PRODUITS -->

<?php if(isset($_GET['action']) && $_GET['action'] == 'affichage'): ?> <!-- tt l'affichage sera dans une condition -->

<!--
Exo : Réaliser le traitement permettant l'affichage des produits sous forme de tableau HTML
-->

         <h1 class="display-4 text-center">LISTE DES PRODUITS</h1><hr>

         <?= $validate; ?>

        <?php
        $result = $bdd->query("SELECT * FROM produit");
        $produits = $result->fetchAll(PDO::FETCH_ASSOC);
        // echo '<pre>'; print_r($produits); echo '</pre>';
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
                  <td><img src="<?= $value ?>" alt="<?= $tab['titre'] ?>"
                  class="card-img-top"></td>
                <?php else: ?>
                  <td><?= $value ?></td>
                <?php endif; ?>
              

            <?php endforeach; ?>
            <td><a href="?action=modification&id_produit=<?=$tab['id_produit']?>" class="text-primary" ><i class="fas fa-edit"></i></a></td>
            <td><a href="?action=suppression&id_produit=<?=$tab['id_produit']?>" class="text-danger" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </table>

<?php endif; // fin de la condition 
?>

<!-- FIN AFFICHAGE PRODUITS -->


    <?php if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')): ?> <!-- tte l'affichage sera dans une condition -->

    <!-- <?php echo '<pre>'; print_r($_GET); echo '</pre>';  ?> -->
   
    <h1 class="display-4 text-center" ><?= strtoupper($action) ?> D'UN PRODUIT</h1><hr>
    <!--
    1. Réaliser un formulaire  permettant d'insérer un produit dans la table 'produit' (sauf le champs :id_produit)
    --> 
    <?php
    if(isset($_GET['id_produit']))
    {
        $resultat = $bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
        $resultat->bindValue('id_produit', $id_produit, PDO::PARAM_INT);
        $resultat->execute();

        $produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
        echo '<pre>'; print_r($produit_actuel); echo '</pre>';
    }

      // le produit qu'on a ds le tableau isset(si on a une reference existante) alors je l'affiche dans une variable....sinon on stock une chaine de caractère vide
    $reference =(isset($produit_actuel['reference'])) ? $produit_actuel['reference'] : '';
    $categorie =(isset($produit_actuel['categorie'])) ? $produit_actuel['categorie'] : '';
    $titre =(isset($produit_actuel['titre'])) ? $produit_actuel['titre'] : '';
    $description =(isset($produit_actuel['description'])) ? $produit_actuel['description'] : '';
    $couleur =(isset($produit_actuel['couleur'])) ? $produit_actuel['couleur'] : '';
    $taille =(isset($produit_actuel['taille'])) ? $produit_actuel['taille'] : '';
    $public =(isset($produit_actuel['public'])) ? $produit_actuel['public'] : '';
    $photo =(isset($produit_actuel['photo'])) ? $produit_actuel['photo'] : '';
    $prix =(isset($produit_actuel['prix'])) ? $produit_actuel['prix'] : '';
    $stock =(isset($produit_actuel['stock'])) ? $produit_actuel['stock'] : '';
    ?> <!-- "?" remplace le if et ":" remplace le else, si la référence ds la bdd est connu on l'affiche sinon on affiche une chaine de caractère -->



    <form method="post" action="" class="col-md-6 offset-md-3 form1" enctype="multipart/form-data"><!-- enctype : obligatoire en PHP pour recolter les informations d'1 fichier uploadé -->

      <div class="form-group">
            <label for="Reference">Référence</label>
            <input type="text" class="form-control" id="reference" name="reference" placeholder="Enter reference" value ="<?= $reference ?>"> <!-- ds value on stock le produit qu'on a ds la bdd -->
      </div>

      <div class="form-row"> <!-- ligne -->
         <div class="form-group col-md-6">
            <label for="categorie">Catégorie</label>
            <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Enter la catégorie" value ="<?= $categorie ?>">
         </div>
        <div class="form-group col-md-6">
            <label for=titre>Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Enter titre" value ="<?= $titre ?>">
        </div>
      </div>                <!-- fermeture de ligne -->

       <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Entrer description" value ="<?= $description ?>">
       </div>

      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="couleur">Couleur</label>
            <input type="text" class="form-control" id="couleur" name="couleur" placeholder="Enter couleur" value ="<?= $couleur ?>">
         </div>
             <div class="form-group col-md-6">
              <label for="taille">Taille</label>
              <select id="taille" class="form-control" name="taille">
                <option selected>Choose...</option>
                <option value="s"<?php if($taille == 's') echo 'selected'; ?>>S</option>
                <option value="m"<?php if($taille == 'm') echo 'selected'; ?>>M</option>
                <option value="l"<?php if($taille == 'l') echo 'selected'; ?>>L</option>
                <option value="xl"<?php if($taille == 'xl') echo 'selected'; ?>>XL</option>
              </select>
             </div>
      </div>
        <div class="form-row">
            <div class="form-group col-md-6">
             <label for="public">Public</label>
             <select class="form-control" id="public" name="public">
             <option selected>Choose...</option>
             <option value="m"<?php if($public == 'm') echo 'selected'; ?>>Homme</option>
             <option value="f"<?php if($public == 'f') echo 'selected'; ?>>Femme</option>
             <option value="mixte"<?php if($public == 'mixte') echo 'selected'; ?>>Mixte</option>      
             </select>        
            </div>
          <div class="form-group col-md-6">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo"> <!-- ds "file" on peut pas récupérer la valeur "photo",il va insérer du vide...du coup on créer un champ caché pour récuprer l'url de la photo -->
          </div>
          <?php if(!empty($photo)): ?>
          <em>Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</em><br>
          <img src="<?= $photo ?>" alt="<?= $titre ?>" class="card-img-top">
          <?php endif; ?>
          <input type="hidden" id="photo_actuelle" name="photo_actuelle" value="<?= $photo ?>">
        </div>

        <div class='form-row'>
          <div class="form-group col-md-6">
            <label for="prix">Prix</label>
            <input type="text" class="form-control" id="prix" name="prix" placeholder="Enter prix" value ="<?= $prix ?>">
         </div>
          <div class="form-group col-md-6">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter stock" value ="<?= $stock ?>">
          </div>
        </div>

        <button type="submit" class="btn btn-success col-md-12"><?= $action ?></button>
    </form>

<?php
endif;
require_once('../include/footer.php');
?>