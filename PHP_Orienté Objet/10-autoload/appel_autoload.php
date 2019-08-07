<?php
// Habituellement pour faire appel à des fichiers nous executons require_once() mais imaginons que nous avons 100 classes déclarées dans 100 fichier, nous ne devons pas faire 100 require_once()
// require_once("A.class.php");
// require_once("B.class.php");
// require_once("C.class.php");
// require_once("D.class.php");

require_once('autoload.php');
// Exo : instancier les 4 classes afin d'observer si l'autoload fonctionne correctement
$a = new A;
$b = new B;
$c = new C;
$d = new D;
