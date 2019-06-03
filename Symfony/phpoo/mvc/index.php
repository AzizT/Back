<?php
// en MVC => model view controller
// un seul fichier, index, va appeler différnetes fonctionnalités

// www.maboutique.com/index.php?controller=produits&action=boutique
// $a = new produitsController;
// $a-> boutique();

// www.maboutique.com/index.php?controller=produits&action=affichage&id=165
// $a = new produitsController;
// $a -> affichage(165);

// www.maboutique.com/index.php?controller=users&action=inscription
// $a = new usersController;
// $a->inscription();

// réecriture d' URL
// www.maboutique.com/produits/affichage/165
// $a = new produitsController;
// $a->affichage(165);

// routing
// www.maboutique.com/product/show/165
// $a = new produitsController;
// $a->affichage(165);

require('produitsController.php');
// localhost/back/symfony/phpoo/mvc/index.php

$a = new produitsController;
$a -> boutique();
?>