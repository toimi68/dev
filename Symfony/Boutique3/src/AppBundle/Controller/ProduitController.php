<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Produit;


class ProduitController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        // 1 / récupérer les infos 
        $repo = $this -> getDoctrine() -> getRepository(Produit::class);
        $produits = $repo-> findAll();

        // 1.2 Récupérer les catégories :

        $em = $this ->getDoctrine() ->getManager();

        // Create Query : 
        $query = $em ->createQuery("SELECT DISTINCT(p.categorie) FROM 
        AppBundle\Entity\Produit p ORDER BY p.categorie ASC");
        $categories = $query ->getResult(); // equivalent au FETCH_ASSOC


        // Query Builder : 
        $query = $em -> createQueryBuilder();
        $query
            -> select('p.categorie')
            -> distinct(true)
            ->from(Produit::class, 'p') // doctrine produit des entite et non des tables
            ->orderBy('p.categorie', 'ASC');

            // SELECT DISTINCT (categorie) FROM produit ORDER BY categorie ASC
            $categories = $query ->getQuery() ->getResult();




        //2: Retourner une vue
        $params = array(
            'produits' => $produits,
            'categories' => $categories
        );
        return $this -> render('@App/Produit/index.html.twig', $params);
    }
    /**
     * @Route("/produit/{id}", name="produit")
     * www.maboutique.com/produit/12
     */
    public function produitAction($id)
    {

        //Méthode 1 : Repository
        $repo = $this -> getDoctrine() -> getRepository(Produit::class);
        $produit = $repo-> find($id);

        // Méthode 2 : EntityManager
        $em = $this ->getDoctrine () ->getManager();
        $produit = $em -> find(Produit::class, $id);


        $params = array(
            'id' => $id,
            'produit' => $produit
        );
        return $this -> render('@App/Produit/show.html.twig', $params);
    }
     /**
     * @Route("/categorie/{cat}", name="categorie")
     * www.maboutique.com/categorie/tshirt
     * 
     */ 
    public function categorieAction($cat)
    {
        // 1 : Récuperer les infos
        $repo = $this -> getDoctrine() -> getRepository(Produit::class);
        $produits = $repo ->findBy(array('categorie' => $cat ));

        $categories = $repo ->getAllCategories();

        // 2: Afficher la vue
        $params = array(
            'produits' => $produits,
            'categories' => $categories
        );
        return $this -> render('@App/Produit/index.html.twig', $params);
    } 
    // test:localhost : 8000/categorie/pull
    // test:localhost : 8000/categorie/chemise
    // test:localhost : 8000/categorie/tee-shirt
    
}
