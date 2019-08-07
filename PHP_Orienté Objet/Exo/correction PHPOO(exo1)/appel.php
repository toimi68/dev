<?php
// J'appelle ma classe Etudiant
require_once 'Etudiant.php';

// j'instancie ma class Etudiant

$etudiant = new Etudiant; // on va appeler de nouveau element de ma classe etudiant

$etudiant->setPrenom('Nassim');
$etudiant->setNom('Amara');
$etudiant->setEmail('nassim.amara@lepoles.com');
$etudiant->setTelephone('0615919616');

$e = $etudiant->getInfos();
// APPEL DE LA FONCTION getInfo() pour éviter de réecrire tout les geteurs

// 2eme etudiant

$etudiant2 = new Etudiant; // on va appeler de nouveau element de ma classe etudiant

$etudiant2->setPrenom('djamila');
$etudiant2->setNom('chabane');
$etudiant2->setEmail('djamila.chabane@lepoles.com');
$etudiant2->setTelephone('0753268576');

// $etudiant->getPrenom();
// $etudiant->getNom();
// $etudiant->getEmail();
// $etudiant->getTelephone();
$e2 = $etudiant2->getInfos();

?>

<h2>Etudiant :<?= $e['prenom'] . ' '  . $e['nom'] ?> </h2>
Prénom :<?=$e['prenom'] ?><br>
Nom :<?=$e['nom'] ?><br>
Email :<?=$e['email'] ?> <br>
Téléphone :<?=$e['telephone'] ?><br>

<!-- nouveau etudiant -->

<h2>Etudiant :<?= $e2['prenom'] . ' '  . $e2['nom'] ?> </h2>
Prénom :<?=$e2['prenom'] ?><br>
Nom :<?=$e2['nom'] ?><br>
Email :<?=$e2['email'] ?> <br>
Téléphone :<?=$e2['telephone'] ?><br>