<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!-- lang="fr" -->
<!-- cette ligne est désormais obsolète, remplacée  par celle ci dessous -->
<!-- <?php language_attributes(); ?> -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- remplace charset="UTF8" -->
    <!-- bloginfo est une focntion WP qui retourne le bon encodage -->


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>
    <!-- permet d' ecrire le titre via le site WP -->
    <?php wp_head(); ?>
    <!-- permet de charger des fichiers indispensables a WP...ici, elle va notamment afficher la barre de navigation noire de WP en haut de page -->

    <!-- link fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- cdn bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- mon css -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">
    <!-- fonction WP qui remplace css(/style.css)... et retourne l' URL du theme portfolio -->

    <!-- link googlefonts -->
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
    <!-- fait appel a des classes de WP -->

    <div class="container-fluid px-0">

        <div class="d-flex">

            <div class="col-md-4 d-flex justify-content-around hauteur">
                <?php dynamic_sidebar('Haut-gauche') ?>
                <!-- cette fonction WP nous permet de faire appel aux régions créees dans le fichier functions.php -->

            </div>

            <div class="col-md-4 d-flex justify-content-around hauteur">
                <?php dynamic_sidebar('Haut-centre') ?>

            </div>

            <div class="col-md-4 hauteurD">
                <?php dynamic_sidebar('Haut-droite') ?>

            </div>

        </div>

        <nav class="navbar navbar-dark bg-dark">

            <a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample01">
                <ul class="navbar-nav mr-auto">
                    <?php wp_nav_menu(array('container_class' => 'menu_header', 'theme_location' => 'primary')) ?>
                    <!-- wp_nav_menu() est une fonction spécifique WP qui nouspermet d' importer le menu principal ( primary ) que l' on a crée dans le fichier function.php
            - container_class => menu_header veut dire que notre menu aura comme class menu_header
            - theme_location => primary permet de préciser que cela sera notre menu principal-->

                </ul>
                <form class="form-inline my-2 my-md-0">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </nav>

    </div>

    <section class="ma-section">