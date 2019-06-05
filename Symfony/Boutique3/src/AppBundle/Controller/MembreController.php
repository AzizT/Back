<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends Controller
{
    /**
     * @Route("/membre/inscription/", name="membre_inscription")
     */
    public function inscriptionMembreAction()
    {
        $params = array();
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
