<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin/produit/", name="admin_produit")
     * www.maboutique.com/admin/
     */

    public function adminProduitAction()
    {
        $params = array();
        return $this->render('@App/Admin/list_produit.html.twig', $params);
    }

    /**
     * @Route("/admin/produit/add", name="admin_produit_add")
     * www.maboutique.com/admin/formulaire/...
     */

    public function adminProduitAddAction()
    {
        $params = array();
        return $this->render('@App/Admin/form_produit.html.twig', $params);
    }

    /**
     * @Route("/admin/produit/update/{id}", name="admin_produit_update")
     * www.maboutique.com/admin/formulaire/...
     */

    public function adminProduitUpdateAction($id)
    {
        $params = array(
            'id' => $id
        );
        return $this->render('@App/Admin/form_produit.html.twig', $params);
    }

    /**
     * @Route("/admin/produit/delete/{id}", name="admin_produit_delete")
     * www.maboutique.com/admin/formulaire/...
     */

    public function adminProduitDeleteAction($id, Request $request)
    {
        $params = array();
        $request -> getSession() -> getFlashBag() -> add('success', 'le produit n°' . $id . ' a bien été supprimé');
        return $this-> redirectToRoute('admin_produit');

        // test => localhost:8000/admin/produit/delete/12
    }

    /**
     * @Route("/admin/membre/", name="admin_membre")
     * www.maboutique.com/admin/
     */

    public function adminMembreAction()
    {
        $params = array();
        return $this->render('@App/Admin/list_membre.html.twig', $params);
    }

    /**
     * @Route("/admin/membre/add", name="admin_membre_add")
     * www.maboutique.com/admin/
     */

    public function adminMembreAddAction()
    {
        $params = array();
        return $this->render('@App/Admin/form_membre.html.twig', $params);
    }

    /**
     * @Route("/admin/membre/update/{id}", name="admin_membre_update")
     * www.maboutique.com/admin/
     */

    public function adminMembreUpdateAction($id)
    {
        $params = array(
            'id' => $id
        );
        return $this->render('@App/Admin/form_membre.html.twig', $params);
    }

    /**
     * @Route("/admin/membre/delete/{id}", name="admin_membre_delete")
     * www.maboutique.com/admin/
     */

    public function adminMembreDeleteAction($id, Request $request)
    {
        $params = array();
        $request->getSession()->getFlashBag()->add('success', 'le membre n°' . $id . ' a bien été supprimé');
        return $this->redirectToRoute('admin_membre');

        // test => localhost:8000/admin/membre/delete/12
    }

    /**
     * @Route("/admin/commande/", name="admin_commande")
     * www.maboutique.com/admin/
     */

    public function adminCommandeAction()
    {
        $params = array();
        return $this->render('@App/Admin/list_commande.html.twig', $params);
    }

    /**
     * @Route("/admin/commande/add", name="admin_commande_add")
     * www.maboutique.com/admin/
     */

    public function adminCommandeAddAction()
    {
        $params = array();
        return $this->render('@App/Admin/form_commande.html.twig', $params);
    }

    /**
     * @Route("/admin/commande/update/{id}", name="admin_commande_update")
     * www.maboutique.com/admin/
     */

    public function adminCommandeUpdateAction($id)
    {
        $params = array(
            'id' => $id
        );
        return $this->render('@App/Admin/form_commande.html.twig', $params);
    }

    /**
     * @Route("/admin/commande/delete/{id}", name="admin_commande_delete")
     * www.maboutique.com/admin/
     */

    public function adminCommandeDeleteAction($id, Request $request)
    {
        $params = array();
        $request->getSession()->getFlashBag()->add('success', 'le membre n°' . $id . ' a bien été supprimé');
        return $this->redirectToRoute('admin_commande');

        // test => localhost:8000/admin/commande/delete/12
    }
}
