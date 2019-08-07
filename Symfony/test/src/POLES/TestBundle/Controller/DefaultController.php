<?php

namespace POLES\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        // return $this->render('POLESTestBundle:Default:index.html.twig');
        return $this->render('@POLESTest/Default/index.html.twig');

    }
    /** 
     * @route("/bonjour/") (route=url)
     * Localhost:8000/bonjour
     * www.maboutique.com/bonjour
     */
    public function bonjourAction()
    {
        // la route elle suit la fonction
        echo 'Bonjour';
    }
    // test : localhost:8000/bonjour

    /** 
     * @Route("/bonjour2/")
     * 
     */

    public function bonjour2Action()
    {
        // la route elle suit la fonction
        return new Response ('Bonjour');
    }
    // test : localhost:8000/bonjour2
    /** 
     * @Route("/hello/{prenom}/")
     * 
     */
    //----------------------------------------
    public function helloAction($prenom)
    {
        // la route elle suit la fonction
        return new Response ('Bonjour '. $prenom . ' !');

    }
    // test : localhost:8000/hello/Djamila
    // test : localhost:8000/hello/Yakine
// ---------------------------------------------------------

    /** 
     * @Route("/hola/{prenom}/")
     * 
     */
    public function holaAction($prenom)
    {
        $params = array(
            'prenom' => $prenom
        );
        return $this->render("@POLESTest/Default/hola.html.twig", $params);

    }
    //------------------------------------------------
    /** 
     * @Route("/ciao/{prenom}/{age}/")
     */
    public function ciaoAction($prenom, $age)
    {
        
        return $this->render("@POLESTest/Default/ciao.html.twig",array(
            'prenom' => $prenom,
            'age' => $age
        )); 

    }
    // A faire : terminer la fonctionnalité "ciao" de sorte que la page localhost:8000/ciao/Djamila/38 affiche "vous vous appelez Djamila et vous avez 38 ans".

    //-----------------------------------
    /** 
     * @Route("/redirect/")
     * Redirection vers l'accueil
     */
    public function redirectAction()
    {
        $route = $this-> get('router') -> generate('accueil');
        return new RedirectResponse($route);
        
    }
    // test : localhost:8000/redirect/
//-----------------------------------
    /** 
     * @Route("/redirect2/")
     * Redirection vers l'accueil
     */
    public function redirect2Action()
    {
        return $this->redirectToRoute('accueil');
    }
    // test : localhost:8000/redirect2/

    //-----------------------------------
    /** 
     * @Route("/message/")
     * 
     */
    public function message2Action(Request $request)
    {
       $session = $request->getSession();
       $session -> getFlashBag() -> add('success', 'Votre adresse email n\'est pas validée');
       $session -> getFlashBag() -> add('error', 'Félicitations vous étes inscrits');
       return $this->redirectToRoute('accueil');
    }
    // test : localhost:8000/message/

}
