<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Produit;
use AppBundle\Entity\Membre;
use AppBundle\Entity\Commande;
use AppBundle\Entity\DetailsCommande;

use AppBundle\Form\ProduitType;
use AppBundle\Form\MembreType;


class AdminController extends Controller
{
    /**
     * @Route("/admin/produit/", name="admin_produit")
     * www.maboutique.com/admin/
     */
    public function adminProduitAction()
    {
        $repository = $this ->getDoctrine() ->getRepository(Produit::class);
        $produits = $repository ->findAll();

        $params = array(
            'produits' => $produits
        );
        return $this -> render('@App/Admin/list_produit.html.twig', $params);
    }
    

    //************************-----ADD-------************************
    
    /**
     * @Route("/admin/produit/add/", name="admin_produit_add")
     * 
     */
    public function adminProduitAddAction(Request $request)
    {
        $produit = new Produit;
        // On crée un objet produit de l'entité produit (vide)

        $form =$this -> createForm(ProduitType::class, $produit); // On créer un formulaire du type produit, et on le lie à notre objet $produit. On dit que le formulaire va hydrater l'objet (les infos du formulaire vont remplir l'objet).

        $form -> handleRequest($request);
        // va lier definitivement l'objet $produit au formulaire...Elle permet de traiter les informations en POST
        
        if($form -> isSubmitted() && $form -> isValid()) 
        {

            $em = $this ->getDoctrine() -> getManager(); // on récup le manager
            $em -> persist($produit); // on enregistre dans le systeme l'objet

            $produit ->uploadPhoto();

            $em -> flush();

            $request -> getSession() -> getFlashBag() -> add('success', 'le produit ' . $produit -> getId() . ' a bien été ajouté !');

            
            return $this ->redirectToRoute('admin_produit');
            // createView() permet de générer la partie visuel (HTML) du formulaire
        }


        $params = array(
            'produitForm' =>$form ->createView(),
            'title' => 'ajouter un produit'
        );

        return $this -> render('@App/Admin/form_produit.html.twig', $params);
    // localhost:8000/admin/produit/add
    // localhost:8000
    }
//***********************---------UPDATE-----------*************************

    /**
     * @Route("/admin/produit/update/{id}", name="admin_produit_update")
     * 
     */
    public function adminProduitUpdateAction($id, Request $request)
    {

        $em = $this ->getDoctrine() ->getManager();//persist et flush sont faite que par le manager

        // je récupère le produit :
        $produit = $em ->find(Produit::class, $id);

        $form = $this -> createForm(produitType::class, $produit);
        // En créant le formulaire, on le lie à notre objet produit qui va être modifié. on dit qu'on hydrate le formulaire.

        $form ->handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid() ){
            
            // je l'enregistre 
            $em ->persist ($produit); 
            $em -> flush();
            
            $request -> getSession() ->getFlashBag() -> add('success', 'Le produit ' . $produit -> getTitre() . ' a bien été modifié !');
            return $this -> redirectToRoute('admin_produit');
        }
   

        $params = array(
            'id' => $id,
            'produitForm' => $form -> createView(),
            'title' => 'Modifier produit ' . $produit -> getTitre(),
            'photo' => $produit -> getPhoto()
                ); // permet d'avoir une vue dynamique
        return $this -> render('@App/Admin/form_produit.html.twig', $params);
    }
    // localhost:8000/admin/produit/update/7




    //*********************-----------DELETE-------------********************

    /**
     * @Route("/admin/produit/delete/{id}/", name="admin_produit_delete" )
     */
    public function adminProduitDeleteAction($id, Request $request)
    {

        $em = $this ->getDoctrine() ->getManager();

        // Récupère l'objet produit
        $produit = $em ->find(Produit::class, $id);

        // Je supprime le produit
        $produit -> removePhoto();
        $em -> remove($produit);
        $em ->flush();


        $request -> getSession() -> getFlashBag() -> add('success', 'le produit n° ' . $id . ' a bien été supprimé');
        return $this -> redirectToRoute('admin_produit'); 
    }
    // test : localhost:8000/admin/produit/delete/12


                //-----------------------------MEMBRE-------------------------

    /**
     * @Route("/admin/membre/", name="admin_membre")
     * www.maboutique.com/admin/membre/
     */
    
    public function adminMembreAction()
    {

        $repo = $this ->getDoctrine() ->getRepository(Membre::class);



        $membres = $repo ->findAll();




        $params = array(
            'membres' => $membres
        );



        return $this -> render('@App/Admin/list_membre.html.twig', $params);        
    }
   // localhost:8000/admin/membre/add
    //************************-----ADD-------************************

    /**
         * @Route("/admin/membre/add/", name="admin_membre_add")
         * 
         */
        public function adminMembreAddAction()
        {
            $params = array();
            return $this -> render('@App/Admin/form_membre.html.twig', $params);
        }

    //***********************-------UPDATE---------*************************

    /**
     * @Route("/admin/membre/update/{id}/", name="admin_membre_update")
     * 
     */
    public function adminMembreUpdateAction($id, Request $request)
    {
        $em = $this -> getDoctrine() -> getManager();

        $membre = $em -> find(Membre::class, $id);

        $form = $this -> createForm(MembreType::class, $membre, ['statut' => 'admin' ]);

        $password = $membre -> getPassword();

        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid()) {

            $em -> persist ($membre);
            $membre -> setPassword($password);
            $em -> flush();

            $request -> getSession() -> getFlashBag() -> add('success' , 'Le profil du membre' . $membre->getPrenom() . ' a été mis à jour ! ');
            return $this -> redirectToRoute('admin_membre');
        }

        $params = array(
            'id' => $id,
            'MembreForm' => $form -> createView()
        );
        return $this -> render('@App/Admin/form_membre.html.twig', $params);
    }

    //************************---------DELETE-----------************************
    /**
     * @Route("/admin/membre/delete/{id}/", name="admin_membre_delete" )
     */
    public function adminMembreDeleteAction($id, Request $request)
    {
        $params = array();
        $request -> getSession() -> getFlashBag() -> add('success', 'le membre n° ' . $membre->getPrenom() . ' a bien été supprimé');
        return $this -> redirectToRoute('admin_membre'); 
    }

                 //-------------------------------COMMANDE---------------------------------/

    /**
     * @Route("/admin/commande/", name="admin_commande")
     * www.maboutique.com/admin/commande
     */
    public function adminCommandeAction()
    {
        $repo = $this -> getDoctrine() -> getRepository(commande::class);
        $commandes = $repo ->findAll();


        $params = array(
            'commandes' => $commandes
        );
        return $this -> render('@App/Admin/list_commande.html.twig', $params);
    }

    //************************-----ADD-------************************

    /**
     * @Route("/admin/commande/add/", name="admin_commande_add")
     * 
     */
    public function adminCommandeAddAction()
    {
        $params = array();
        return $this -> render('@App/Admin/form_commande.html.twig', $params);
    }

    //*******************-------UPDATE---------**************************

    /**
     * @Route("/admin/commande/update/{id}", name="admin_commande_update")
     * 
     */
    public function adminCommandeUpdateAction($id)
    {
        $params = array(
            'id' => $id
        );
        return $this -> render('@App/Admin/form_commande.html.twig', $params);
    }

    //******************------DELETE-------------*************************

    /**
     * @Route("/admin/commande/delete/{id}/", name="admin_commande_delete" )
     */
    public function adminCommandeDeleteAction($id, Request $request)
    {
        $params = array();
        $request -> getSession() -> getFlashBag() -> add('success', 'le commande n° ' . $id . ' a bien été supprimé');
        return $this -> redirectToRoute('admin_commande'); 
    }

}
