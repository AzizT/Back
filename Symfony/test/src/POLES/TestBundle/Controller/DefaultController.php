<?php

namespace POLES\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        // return $this->render('POLESTestBundle:Default:index.html.twig');
        return $this->render('@POLESTest/Default/index.html.twig');
    }

    /**
     * @Route("/bonjour/")
     * 
     * L' annotation ci dessus sera interprétée par le navigateur car elle commence par @
     * Le double quote est obligatoire, pas de simple quote
     * Ce code doit commencer par ** (première ligne de commentaire)
     * 
     * localhost:8000/bonjour
     * www.maboutique.com/bonjour
     */
    public function bonjourAction()
    {
        echo 'Bonjour';
        // pour tester; localhost:8000/bonjour
    }

    /**
     * @Route("/bonjour2/")
     */

    public function bonjour2Action()
    {
        return new Response('<h1><strong>Bonjour</strong></h1>');
        // pour tester; localhost:8000/bonjour2/
    }
}
