<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil Boutique</title>

    <!-- link fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- mon css -->
    <link rel="stylesheet" href="<?= URL ?>include/css/style.css">

    <!-- googlefont -->
    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">



</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Ma Boutique</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">

                <?php if (internauteEstConnecte()) : ?>
                    <!-- on donne les autorisations a l' utilisateur connecté, et on lui retire le reste
                                                            ici, on lui donne l' autorisation pour profil, panier, boutique + se deconnecter -->

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URL ?>boutique.php">Boutique</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URL ?>profil.php">Profil</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URL ?>panier.php">Panier</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URL ?>connexion.php?action=deconnexion">Deconnexion</a>
                    </li>

                <?php else : ?>
                    <!-- les autorisations pour celui qui n' est pas connecté -->

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URL ?>boutique.php">Boutique</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URL ?>connexion.php">Connexion</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URL ?>inscription.php">Inscription</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URL ?>panier.php">Panier</a>
                    </li>

                <?php endif; ?>

                <?php if (internauteEstConnecteEstAdmin()) : ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Panneau Administrateur</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="<?= URL ?>admin/gestion_boutique.php">Gestion Boutique</a>
                            <a class="dropdown-item" href="<?= URL ?>admin/gestion_commande.php">Gestion Commande</a>
                            <a class="dropdown-item" href="<?= URL ?>admin/gestion_membre.php">Gestion Membre</a>
                        </div>
                    </li>

                <?php endif; ?>

            </ul>
            <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
    </nav>

    <section class="container mon_conteneur mb-4">