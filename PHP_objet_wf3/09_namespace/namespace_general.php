<?php
namespace General;

require_once('namespace_commerce.php');

USE Commerce1, Commerce2, Commerce3;
// permet de préciser quel namespace je souhaite importer de quel fichier

echo __NAMESPACE__ . '<hr>';
// methode magique qui permet d' afficher dans quel namespace on se trouve

$std = new \StdClass();
// var_dump($std);
// sans le anti-slash --> erreur !! l'Interpreteur va chercher si la méthode StdClass() est déclarée dans le namespace 'General', donc pour revenir dans l'espace global de php le temps de ligne, nous devons mettre un anti-slash '\' devant la class

$commande = new Commerce1\Commande;
echo "Nombre de commande : " .$commande->nbCommande . '<hr>';
// var_dump($commande);

$produit = new Commerce2\Produit;
echo "Nombre de commande : " . $produit->nbProduit . '<hr>';
// var_dump( $produit);

$produit = new Commerce3\Produit;
echo "Nombre de commande : " . $produit->nbProduit . '<hr>';
// var_dump($produit);

$produit = new Commerce3\Panier;
echo "Nombre de commande : " . $produit->nbProduit . '<hr>';
// var_dump($produit);
?>