<?php

require_once("include/init.php");
require_once("include/header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-3">

            <h1 class="my-4 titre_boutique">Bienvenue<br>dans<br>la<br>boutique</h1>

            <div class="list-group categorie">

                <?php

                // exo: requete de selection des categories distinctes en bdd

                //      boucler sur chaque categorie et créer un lien

                $resultat = $bdd->query("SELECT DISTINCT categorie FROM produit");

                while ($categorie = $resultat->fetch(PDO::FETCH_ASSOC)) :

                    ?>

                    <a href="?categorie=<?= $categorie['categorie'] ?> " class="list-group-item alert-link text-dark text-center"><?= $categorie['categorie'] ?></a>

                <?php endwhile; ?>

            </div>

        </div>

        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">

                <ol class="carousel-indicators">

                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

                </ol>

                <div class="carousel-inner " role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="photo/slider1.jpg" alt="First slide">
                    </div>

                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="photo/slider2.jpg" alt="Second slide">
                    </div>

                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="photo/slider3.jpg" alt="Third slide">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row">
                <?php if (isset($_GET['categorie'])) :

                // si il y a une categorie dans l' URL (clique selection dans categorie), on selectionne les produits de cette catégorie
                    $resultat = $bdd->prepare("SELECT * FROM produit WHERE categorie= :categorie");
                    $resultat->bindValue(':categorie', $_GET['categorie'], PDO::PARAM_STR);
                    $resultat->execute();

                else :
                    // sinon, il n ya pas de catégorie dans l' URL ( onglet boutique), on selectionne/affiche tous les produits

                    $resultat = $bdd->prepare("SELECT * FROM produit");
                    $resultat->execute();

                endif;
                while ($produits = $resultat->fetch(PDO::FETCH_ASSOC)) :

                    ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="fiche_produit.php?id_produit=<?= $produits['id_produit'] ?>"><img class="card-img-top" src="<?= $produits['photo'] ?>" alt="<?= $produits['titre'] ?>"></a>
                            <div class="card-body">
                                <h4 class="card-title text-center">
                                    <a href="#"><?= $produits['titre'] ?></a>
                                </h4>
                                <h5><?= $produits['prix'] ?> €</h5>
                                <p class="card-text"><?= $produits['description'] ?></p>
                            </div>

                            <div class="card-footer text-center">
                                <a href="" class="alert-link text-dark">Voir le détail</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- /.row -->

        </div>

        <!-- /.col-lg-9 -->

    </div>

    <!-- /.row -->



</div>



<?php

require_once("include/footer.php");

?>