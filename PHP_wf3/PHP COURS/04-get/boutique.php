<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Boutique</title>
</head>
<body>
    <div class="container text-center">
        <h1 class="display-4 text-center">Bienvenue dans notre boutique !! </h1><hr>

        <!-- 
            <a href="fiche_produit.php?indice=valeur&indice=valeur&indice=valeur&indice=valeur">Voir le détail du produit 1</a><br> 
            Le ? permet de délimiter les arguments et l'url de destination
        -->
        <div class="col-md-2 offset-md-5 border border-dark">
            <a href=""><img src="tshirt-rouge.jpg" alt="tshirt-rouge"></a><br>
            <a href="fiche_produit.php?id=1&type=tshirt&couleur=rouge&prix=15">Voir le détail du produit 1</a><br>
        </div>

        <a href="fiche_produit.php?id=2&type=pantalon&couleur=marron&prix=30">Voir le détail du produit 2</a><br>

        <a href="fiche_produit.php?id=3&type=sweat&couleur=vert&prix=50">Voir le détail du produit 3</a><br>

        <a href="fiche_produit.php?id=4&type=chaussette&couleur=noir&prix=8">Voir le détail du produit 4</a><br>

        <a href="fiche_produit.php?id=5&type=chaussure&couleur=beige&prix=69">Voir le détail du produit 5</a><br>
    </div>
</body>
</html>