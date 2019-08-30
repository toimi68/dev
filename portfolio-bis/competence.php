<?php 
require_once("include/init.inc.php");
require_once('include/header.inc.php' );
?>
    <div class="media bg-warning p-3 mt-5">
      <img class="d-flex align-self-center mr-3 img-fluid" src="img/apprendre-html-css-pour-les-nuls.jpg">
      <div class="media-body">
        <h5 class="mt-0">FRONT</h5>
        <p>N'est-il pas majestueux ?</p>
        <p>Le Tigre (Panthera tigris) est un mamifère carnivore de la famille des félidés (Felidae) du genre Panthera. Aisément reconnaissable à sa fourrure rousse rayée de noir, il est le plus grand félin sauvage et l'un des plus grands carnivores du monde.</p>
      </div>
    </div>
    <hr class="style1">
    <!-------------------------------------------------------------------------------------------------------------------->
      <!-- Compétences -->
<?php 
$contenu = '';
$competences = '';


$resultat = $bdd->query("SELECT * FROM competence");
$contenu.='<div class="row">';
while($competences = $resultat->fetch(PDO::FETCH_ASSOC))
{
  
  $contenu.='<div class="space "></div>';
     $contenu.='<div class="col-md-3 service">';
      $contenu.='<div class="text text-center mt-4"><i class="'.$competences['photo_competence'].'"></i></div>';
      $contenu.='<h5 class="card-title text-center">'.$competences['title_competence'].'</h5>';
      $contenu.='<br><p class="card-text text-light text text-center">'.$competences['content_competence'].'</p>';
     $contenu.='</div>';
     
}
$contenu.='</div>';
   ?>
    <!---->
        <div class="container ">

        <?php echo $contenu;?>

    </div>
    <!-- FIN row -->
    <!-------------------------------------------------------------------------------------------------------------------->
    <hr class="style1">

    <?php 
$contenu = '';
$ = '';


$resultat = $bdd->query("SELECT * FROM competence");
$contenu.='<div class="row">';
while($competences = $resultat->fetch(PDO::FETCH_ASSOC))
{
  
  $contenu.='<div class="space "></div>';
     $contenu.='<div class="col-md-3 service">';
      $contenu.='<div class="text text-center mt-4"><i class="'.$competences['photo_competence'].'"></i></div>';
      $contenu.='<h5 class="card-title text-center">'.$competences['title_competence'].'</h5>';
      $contenu.='<br><p class="card-text text-light text text-center">'.$competences['content_competence'].'</p>';
     $contenu.='</div>';
     
}
$contenu.='</div>';
   ?>
    <!---->
        <div class="container ">

        <?php echo $contenu;?>

    </div>
    <!-- FIN row -->

    
    <h1>jQuery & CSS3 Skills Bar</h1>

<div class="skillbar clearfix " data-percent="20%">
	<div class="skillbar-title" style="background: #d35400;"><span>HTML5</span></div>
	<div class="skillbar-bar" style="background: #e67e22;"></div>
	<div class="skill-bar-percent">20%</div>
</div> <!-- End Skill Bar -->
   

<?php require_once('include/footer.inc.php') ?>