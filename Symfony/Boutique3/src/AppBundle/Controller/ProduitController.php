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
        // 1 recuperer les infos

        $repo = $this ->getDoctrine() -> getRepository(Produit::class);
        $produits = $repo -> findAll();

            // 1.2 on récupere aussi les categories

            // methode create query

                $em = $this -> getDoctrine() -> getManager();
                $query = $em -> createQuery( "SELECT DISTINCT(p.categorie) FROM AppBundle\Entity\Produit p ORDER BY p.categorie ASC");
                // on utilise p.categorie par rapport au DQL ( syntaxe similaire a un alias de jointure, mais si ici pas ded jointure) et ensuite le AppBundle car on on manipule un objet et non pas un array
                $categories = $query -> getResult();
                // equivalent du FetchAssoc

            // methode query builder

                $query = $em -> createQueryBuilder();
                $query
                    -> select('p.categorie')
                    -> distinct(true)
                    -> from(Produit::class, 'p')
                    -> orderBy('p.categorie', 'ASC');

                // SELECT DISTINCT(categorie) FROM produit ORDER BY categorie ASC
                $categories = $query ->getQuery() -> getResult();

        
        // 2 retourner une vue
        $params = array(
            'produits' => $produits,
            'categories' => $categories
        );
        return $this->render('@App/Produit/index.html.twig', $params);
    }

    /**
     * @Route("/produit/{id}", name="produit")
     * www.maboutique.com/produit/12
     */

     public function produitAction($id)
     {

        // methode 1 => repository
        // $repo = $this-> getDoctrine()->getRepository(Produit::class);
        // $produit = $repo->find($id);

        // methode 2 => entityManager
        $em = $this -> getDoctrine()-> getManager();
        $produit = $em->find(Produit::class, $id);


        $params = array(
            'id' => $id,
            'produit' => $produit
        );
        return $this -> render('@App/Produit/show.html.twig', $params);
     }

    /**
     * @Route("/categorie/{cat}", name="categorie")
     * www.maboutique.com/categorie/tshirt
     */

    public function categorieAction($cat)
    {
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repo->findBy(array('categorie' => $cat));

        $categories = $repo -> getAllCategories();
        $params = array(
            'produits' => $produits,
            'categories' => $categories
        );
        return $this -> render( '@App/Produit/index.html.twig', $params);
    }

    /*
    test: localhost:8000/categorie/pull
    test: localhost:8000/categorie/chemise
    test: localhost:8000/categorie/tee-shirt
    */

    
}
