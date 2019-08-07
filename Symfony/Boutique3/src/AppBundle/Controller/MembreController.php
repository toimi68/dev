<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Membre;
use AppBundle\Form\MembreType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class MembreController extends Controller
{

    //-------------------INSCRIPTION----------------------------

    /** 
     * @Route("/inscription/", name="inscription")
     * 
     */
    public function inscriptionAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $membre = new Membre; // On crée un objet membre de l'entité produit (vide)

         $form =$this -> createForm(MembreType::class, $membre);
        
         $form -> handleRequest($request);

         if($form -> isSubmitted() && $form -> isValid()) 
         {

            $em = $this ->getDoctrine() -> getManager(); // on récup le manager
            $em -> persist($membre); // on enregistre dans le systeme l'objet
            $membre -> setStatut('0');

            $password = $membre -> getPassword();
            // password saisie dans le formulaire.

            $password_crypte = $encoder -> encodePassword($membre, $password);
            // j'encode le password.

            $membre -> setPassword($password_crypte);

            $membre -> setSalt(NULL);
            $membre -> setRoles(['ROLE_USER']);
            // on définit un role apr défaut

            $em ->flush(); // enregistre dans la BDD

            $request -> getSession() -> getFlashBag() -> add('success', 'Félicitations vous êtes enregistré. Connectez-vous !');

            return $this ->redirectToRoute('inscription');
     // localhost:8000/inscription
         }



        $params = array(
             'MembreForm' =>$form ->createView()
        );
        return $this -> render('@App/Membre/inscription.html.twig', $params);
    }

      //-------------------PROFIL----------------------------
    
/** 
 * @Route("/profil/", name="profil")
 * 
 */
public function profilAction()
{
    $params = array();
    return $this -> render('@App/Membre/profil.html.twig', $params);
}  

}
