<?php
final class Application
{
    public function lancementApplication()
    {
        return "L'appli se lance comme celà !!<hr>";
    }
}
//--------------------------------------------------------------
// final permet de vérouiller une class ou une méthode, c'est une méthodologie de travail
$app = new Application; // Une classe finale est bien instanciable
echo '<pre>'; var_dump($app); echo '</pre>';
echo $app->lancementApplication();

// class Test extends Application () --> /!\ erreur !! Il n'est pas possible d'hériter d'une  classe finale

class Application2
 {
    final public function lancementApplication()
    {
        return "L'appli se lance comme cela !!<hr>";
    }
 }
 //------------------------------------------------------------
 class Extension extends Application2
 {
    // public function lancementApplication()
    // {
        // /!\ erreur !! en cas d'héritage, il n'est pas possible de redéclarer une méthode 'final', Elle est vérouillé, on ne peut plus la surchargé / amélioré
    // }
 }
//-------------------------------------------------------------
$ext= new Extension;
echo $ext->lancementApplication();

//------------------------------------------------------------
// L'intéret de mettre le mot clé 'final' sur une méthode est de vérouiller afin d'empecher tout sous-classe de la redéfinir (quand nous vboulons que le comportement d'une méthode soit préservé durant l'héritage)