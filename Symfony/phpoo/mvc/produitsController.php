<?php

require('produitsModel.php');

class produitsController

   {        //afficher tous les produits

    private $model;
    // contient le produit/objet model

    public function __construct()
        {
            $this -> model = new produitsModel;
        }
    

       public function boutique(){
        //mission de la fonction, afficher tous les produits, en 1 les recuperer dans la bdd
        $produits = $this -> model -> findAll();
        $categories = $this -> model -> findCat();
        // echo '<pre>'; print_r($produits);echo '</pre>';

        require('produits.php');

       }

    //    , et en 2 les afficher        //afficher un seul produit

       public function affichage($id){        }        //afficher tous les produits d'une cat

       public function categorie($categorie){        }

       //ajouter un produit

       public function ajouterProduit($data){        }

       //modifier un produit

       public function modifierProduit($id,$data){        }

       //supprimer un produit

       public function supprimerProduit($id){        }    }