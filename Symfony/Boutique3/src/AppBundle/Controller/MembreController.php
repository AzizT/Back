<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Membre;
use AppBundle\Form\MembreType;

class MembreController extends Controller
{
    /**
     * @Route("/membre/inscription/", name="membre_inscription")
     */
    public function inscriptionMembreAction(Request $request)
    {

        $membre = new Membre;

        $form = $this->createForm(
            MembreType::class, $membre);

        $form->handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid())
        {
            $em -> persist($membre);
        $em -> flush();
        // je l' enregistre puis execute vers la bdd

        $request -> getSession() -> getFlashBag() -> add('success', $membre -> getNom() . ' vous avez réussi votre inscription !');
        // message de validation

        return $this -> redirectToRoute('connexion');
        // redirection 
        }

        $params = array(
            'membreForm' => $form->createView(),
        );
        return $this->render('@App/Membre/inscription_membre.html.twig', $params);
    }

    /**
     * @Route("/membre/connexion/", name="membre_connexion")
     */
    public function connexionMembreAction()
    {
        $params = array();
        return $this->render('@App/Membre/connexion_membre.html.twig', $params);
    }
    /**
     * @Route("/membre/profil/", name="membre_profil")
     */
    public function profilMembreAction()
    {
        $params = array();
        return $this->render('@App/Membre/profil_membre.html.twig', $params);
    }
}
