<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $params = array();
        return $this->render('@App/Produit/index.html.twig', $params);
    }

    /**
     * @Route("/produit/{id}", name="produit")
     * www.maboutique.com/produit/12
     */

     public function produitAction($id)
     {
        $params = array(
            'id' => $id
        );
        return $this -> render('@App/Produit/show.html.twig', $params);
     }

    /**
     * @Route("/categorie/{cat}", name="categorie")
     * www.maboutique.com/categorie/tshirt
     */

    public function categorieAction($cat)
    {
        $params = array();
        return $this -> render('@/Produit/index.html.twig', $params);
    }
}
