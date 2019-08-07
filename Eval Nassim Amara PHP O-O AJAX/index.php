<?php
require('init.php');
if(isset($_GET['page']) && $_GET['page'] == 'conducteur') require('conducteur.php');
if(isset($_GET['page']) && $_GET['page'] == 'association_vehicule_conducteur') require('association_vehicule_conducteur.php');
if(isset($_GET['page']) && $_GET['page'] == 'vehicule') require('vehicule.php');
 // condition du formulaire ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- lien bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Eval finale</title>
</head>
<body>
    	<header>
			<nav class="navbar navbar-inverse navbar-fixed-top">
				  <div class="container">
					<div id="navbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a href="?page=conducteur">Conducteur</a></li>
							<li><a href="?page=association_vehicule_conducteur">Association</a></li>
							<li><a href="?page=vehicule">vehicule</a></li>
						</ul>
					</div>
				  </div>
			</nav>
        </header>
        <section>
			<div class="container">
				<?php echo $contenu; ?>
			</div>
		</section>
		<footer></footer>
</body>
</html>