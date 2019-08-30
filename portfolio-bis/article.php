
<?php 
require_once("include/init.inc.php");
require_once('include/header.inc.php' );

$contenu = "";
// requete de selection on recupere les articles de la  BDD
$resultat = $bdd->query("SELECT * FROM article");
while ($article = $resultat->fetch(PDO::FETCH_ASSOC)) 
{
    // On affiche la card via la variable $contenu 
    $contenu.='<div class="col-md-12 card m-2" style="width: 18rem;">';
      $contenu.='<div class="card-body">';
        $contenu.='<h5><a class="card-title" href="article.php?idArticle=' . $article['idArticle'] . '">' . $article['artTitle'] . '</a></h5>';
        $contenu.='<p class="card-text text-justify">'.$article['content'].'</p>';
        $contenu.='<p class="card-text text-justify">'.$article['dateArt'].'</p>';
        $contenu.='<p class="card-text text-justify">'.$article['fNameAuteurArt'].'</p>';
        $contenu.='<p class="card-text text-justify">'.$article['lNameAuteurArt'].'</p>';
        $contenu.='<img src="img/'.$article['photoArticle'].'" alt=" class="cardImage" height="500em" width="500em">;</p>';
     $contenu .=  '<a href="'.$article["linkArticle"].'" class="btn btn-outline-info" target="_blank">Lire</a>';
      $contenu .= '</div>';
    $contenu .= '</div>';
  
    
    
}
?>


<section class="container">
    <div class="row">
        <?= $contenu; ?>
    </div>
    <!--  Fin row -->
</section>

<?php require_once 'include/footer.inc.php' ?>  