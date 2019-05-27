<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'vider')
{
    unset($_SESSION['panier']);
}

if(isset($_GET['action']) && $_GET ['action'] == 'create' || isset($_SESSION['panier']))
{
    $_SESSION['panier'] = array(26,27,28);
    echo "Produit présent dansle panier : " . implode($_SESSION['panier'], '-') . '<hr>';
    echo '<a href ="?action=vider">Vider le panier</a>';
}
else{
    echo '<a href ="?action=create">Créer le panier</a>';
}

/*
Architecture MVC
- M => model (echange avec la bdd)
- V => view (affichage et présentation des données - HTML & CSS)
- C => controller ( traitement php)

Le but d' une architecture MVC est de séparer les langages au maximum, séparer les couches

AVANTAGES

- Rangement et clarté optimisés
  Si le design doit changer, on peut demander a l' intégrateur de procéder aux maj. Il ne risquera pas d' amputer le code par erreur
- Favorise le travail d' équipe et les maj

INCONVENIENTS

- Nombre de fichiers élevé, trop complexe pour de petites applications


Les CMS comme Wordpress ou Drupal fonctionnent de la sorte
*/

?>