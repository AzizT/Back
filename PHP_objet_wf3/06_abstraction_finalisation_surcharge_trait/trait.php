<?php
trait TPanier
{
    public $nbProduit = 1;
    public function affichageProduits()
    {
        return "Affichage des produits ! <hr>";
    }
}
// *************************************************

trait TMembre
{
    public function affichageMembres()
    {
        return "Affichage des membres ! <hr>";
    }
}
// *************************************************

class Site
{
    USE TPanier, TMembre;
}

// exo: creer un objet de la classe site et afficher toutes les methodes issues de cette classe
$site = new Site;
echo '<pre>'; print_r(get_class_methods($site)); echo '</pre>';
echo '<pre>'; print_r($site); echo '</pre>';
echo $site->affichageProduits();
echo $site->affichageMembres();
echo "Nombre de produits dans le panier : " . $site->nbProduit;

// les traits ont été inventés pour repousser les limites de l' héritage. Il est donc possible pour une classe d' hériter de plusieurs traits en même temps.
// un trait est un regroupement de methodes et de propriétés pouvant etre importés dans une classe
?>