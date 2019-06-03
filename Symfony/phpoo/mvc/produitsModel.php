<?php
     class produitsModel{
         private $pdo;
         public function __construct()
         {
             $this -> pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,));
         }

        //  la mission de ce fichier produits_model est d' interagir avec la table produit dans la bdd site (requete sql)

        // recuperer tous les produits
        public function findAll()
        {
            $resultat = $this -> pdo -> query ('SELECT*FROM produit');
            $produits = $resultat -> fetchAll();
            return $produits;
        }
// récupérer les categories
        public function findCat()
        {
        $resultat = $this->pdo->query('SELECT DISTINCT(categorie) FROM produit');
        $categories = $resultat->fetchAll();
        return $categories;
        }
    // recuperer un produit par l' ID
    public function find($id)
    {
        $resultat = $this->pdo->query('SELECT * FROM produit WHERE id_produit = :id_produit');
        $produit = $resultat->fetch();
        return $produit;
    }
        // recuperer tousles produits par la categorie

        

        // insert
        // update
        // delete
     }
?>