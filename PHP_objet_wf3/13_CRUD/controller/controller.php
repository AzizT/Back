<?php
// le fichier controller.php contient toute les actions et les méthodes a executées. Par exemple si je souhaite afficher des informations 10 par 10, c'est dans ce fichier que l'on fera ce traitement 
namespace Controller;

class Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new \Model\EntityRepository; // permet de récupérer une connexion à la BDD qui se trouve dans le fichier EntityRepository.php
    }
    public function handlerRequest()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL; // si 'op' est défjint dans l'URL, on le stock dans une variable sinon on stock 'NULL'

        try
        {
            if($op == 'add' || $op == 'update') $this->save($op); // si on ajoute ou modifie un employé, on appal la méthode save()
            elseif($op == 'select') $this->select(); // si on selectionne 1 employé, on fait appel à la méthode select()
            elseif($op == 'delete') $this->delete(); // si on supprime un employé, on fait appel à la méthode delete()
            else $this->selectAll(); // permet d'afficher l'ensemble des employés
        }
        catch(Exception $e)
        {
            die("Problème dans l'action de l'internaute !!!");
        }
    }

    public function selectAll()
    {
        // echo 'Méthode selectAll !!';
        // $r = $this->db->selectAll();
        // // db --> représente un objet issu de la classe EntityRepository
        // // db->selectAll() : on pointe sur la méthode selectAll() déclarée dans la classe EntityRepository 
        // echo '<pre>'; print_r($r); echo '</pre>';
        $this->render('layout.php', 'donnees.php', array('title' => 'Toute les donnéees', 'donnees' => $this->db->selectAll(),// on pointe sur la méthode déclarée dans EntitYRepository.php
        'fields'  => $this->db->getFields(), // on pointe sur la méthode déclarée dans EntitYRepository.php
        'id' => 'id' . ucfirst($this->db->table)
        // affiche id_Employe et cela servira a pointer sur' l indice id_Employe du tableau de données envoyé dans le leyout ^pour les liens voir/modifier/supprimer
    ));
    }

    public function save($op)
    {
        $title = $op; // permet de récuperer la donnée envoyée dans l'URL et de la stocker dans $title
        if($_POST)
        {
            $r = $this->db->save(); // lorsque l'on valide le formulaire d'ajout, on execute la methode save() du fichier EntityRepository.php
        }
        $this->render('layout.php', 'donnees-form.php', array(
        "title" => "Donnée : $title",
        "op" => $op,
        'fields'  => $this->db->getFields()
        
        ));
    }
    public function render($layout, $template, $parameters = array())
    {
        extract($parameters); // permet d'avoir les indices du tableau comme variable
        ob_start(); // commence la temporisation

        require "view/$template";
        // $content = require "view/$template";

        $content = ob_get_clean(); // tout ce qui se trouve dans la template sera stockée dans $content grace à la fonction ob_get_clean();

        ob_start(); // temporise la sortie de l'affichage
        require "view/$layout";
        return ob_end_flush() ; // permet de liberer l'affichage et fait tout apparaitre sur la page

    }
}



