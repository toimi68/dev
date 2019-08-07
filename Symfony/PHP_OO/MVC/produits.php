
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Lien de notre fichier style CSS -->
    <link rel="stylesheet" href="">

    <title>Bienvenue dans ma boutique de OUFFF !!!!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Ma BouTique De OUFFF!!!!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <a class="nav-link" href="">Boutique</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Panier</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Deconnexion</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">Boutique</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Inscription</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Connexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Panier</a>
        </li>
        
       

        </ul>
        <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="Search">
        </form>
    </div>
    </nav>

    <section class="container mon-conteneur">
<div class="row form1">
    
    <div class="col-lg-3">

    <h1 class="my-4">Bienvenue dans la boutique !!!</h1>
    <div class="list-group">
        <p class="list-group-item alert-link text-white bg-dark text-center">CATEGORIES</p>
    
	<?php foreach($categories as $cat): ?>
        <a href="" class="list-group-item alert-link text-dark text-center"><?= ucfirst($cat['categorie']) ?></a>
    <?php endforeach; ?>
	
    </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4 rounded-pill" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner rounded-pill" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="<?= URL ?>photo/boutique1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="<?= URL ?>photo/boutique2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="<?= URL ?>photo/boutique3.jpg" alt="Third slide">
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

        <?php foreach($produits as $pdt):?>
        
        <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href=""><img class="card-img-top" src="<?= $pdt['photo'] ?>" alt="<?= $pdt['titre'] ?>"></a>
            <div class="card-body">
            <h4 class="card-title text-center">
                <a href="fiche_produit.php?id_produit=<?= $pdt['id_produit'] ?>" class="alert-link text-dark"><?= $pdt['titre'] ?></a>
            </h4>
            <h5 class="text-center"><?= $pdt['prix'] ?> €</h5>
            <p class="card-text text-center"><?= $pdt['description'] ?></p>
            </div>
            <div class="card-footer text-center">
            <a href="fiche_produit.php?id_produit=<?= $pdt['id_produit'] ?>" class="alert-link text-dark">Voir le détail&nbsp;&nbsp;<i class="fas fa-search"></i></a>
            </div>
        </div>
        </div>

        <?php endforeach; ?>

    </div>
    <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

</div>
<!-- /.row -->
</section>

    <footer class="bg-dark text-white text-center p-3 fixed-bottom">
        &copy; 2019 - GL - Pas touche c'est mon site à moi !!! 
    </footer>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>