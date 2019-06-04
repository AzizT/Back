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

    /**
     * @Route("/hello/{prenom}/")
     */

     public function helloAction($prenom)
     {
        return new Response('Bonjour ' . $prenom . ' !');
        // pour tester; localhost:8000/hello/Aziz/
     }

    /**
     * @Route("/hola/{prenom}/")
     */

    public function holaAction($prenom)
    {
        $params = array(
            'prenom' => $prenom
        );
        return $this -> render("@POLESTest/Default/hola.html.twig", $params);
    }

    /**
     * @Route("/ciao/{prenom}/{age}/")
     */

    public function ciaoAction($prenom, $age)
    {
        return $this->render("@POLESTest/Default/ciao.html.twig", array(
            // array dans fonction render est équivalent , au dessus, au params declaré avant avec le array a l' interieur
            'prenom' => $prenom,
            'age' => $age
        ));
    }
    // exo: terminer la fonctionnalité 'ciao' de sorte que la page localhost:8000/ciao/Aziz/50 affiche : " Vous vous appelez Aziz et vous avec 50 ans

    /**
     * @Route("/redirect/")
     * pour faire une redirection vers l' accueil
     */
    public function redirectAction()
    {
        $route = $this-> get('router') -> generate('accueil');
        return new RedirectResponse($route);

        // test localhost:8000/redirect/
    }

    /**
     * @Route("/redirect2/")
     * pour faire une seconde redirection vers l' accueil
     */

    public function redirect2Action()
    {
        return $this-> redirectToRoute('accueil');

        // test localhost:8000/redirect2/
    }

    /**
     * @Route("/message/")
     * pour adresser un message a un utilisateur connecté
     */
    public function messageAction(Request $request)
    // entre () cela veut dire que la variable/objet $request appartient a la class Request
    {
        $session = $request -> getSession();
        $session -> getFlashBag() -> add('success', 'Félicitations, vous etes inscrits');
        $session -> getFlashBag() -> add('error', 'Votre adresse email n\' est pas valide');

        return $this -> redirectToRoute('accueil');

        // test localhost:8000/message/ => redirection vers l' accueil
    }
}
