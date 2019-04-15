<?php

$formule = '';
$photo = '';
$prix = '';

if (!empty($_GET)) {
    $formule = $_GET['menu'];
    $photo = $_GET['img'];
    $prix = $_GET['prix'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil Au Pois Gourmand</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- link googlefont srisakdi -->
    <link href="https://fonts.googleapis.com/css?family=Srisakdi" rel="stylesheet">

    <!-- link fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- link vers mon css -->
    <link rel="stylesheet" href="css/style_bis.css">

</head>

<body>
    <!-- début du body, avec bg vert pastel -->

    <div class="container">
        <!-- début du container =>
             douze colonnes centrales
             début du bg pattern -->

    <header>
        
        <nav>
            <h1><a href="index.php"><i class="fas fa-kiwi-bird"></i></a> Au Pois Gourmand</h1>
        </nav>

    </header>
    <?php
        if(empty($_GET))
        {
    ?>

    <!--  Chaque row va avoir le comportement suivant:
        - 1 colonne vide (marge de gauche)
        - 4 colonnes pleines => une formule
        - 2 colonnes vides => la marge centrale qui sépare les deux formules
        - 4 colonnes pleines => la seconde formule
        - 1 colonne vide; la marge de droite, que je n' ai pas besoin de declarer, c' est la        12è colonne naturelle de Bootstrap-->

    <!--la première row, qui va accueillir les deux premiers menus  -->
    <section class="row">

        <!-- forumule Rome -->
        <div class="col-md-4 offset-md-1">

                <div class="card" style="width: 18rem;">

                        <img src="img/rome.jpg" class="card-img-top" alt="...">

                        <div class="card-body">
                                <h5 class="card-title text-center">Formule Rome</h5>
                                <p class="card-text">Tomates buratina<br>
                                      Rizotto aux asperges<br>
                                      Panna cotta</p>
                          <a href="?menu=Rome&prix=25&img=img/rome.jpg" class="btn col-md-12 btn-success">Choisir</a>
                        </div>
                </div>

        </div>

        <!-- formule NY -->
        <div class="col-md-4 offset-md-2">

                <div class="card" style="width: 18rem;">

                        <img src="img/nyork.jpg" class="card-img-top" alt="...">

                        <div class="card-body">
                          <h5 class="card-title text-center">Formule New-York</h5>
                          <p class="card-text">César salade<br>
                                Cheese burger<br>
                                Cheesecake</p>
                          <a href="?menu=New York&prix=23&img=img/nyork.jpg" class="btn col-md-12 btn-danger">Choisir</a>
                        </div>
                </div>

        </div>

    </section>

    <!-- la deuxième row, qui va accueillir les deux derniers menus -->
    <section class="row">

        <!-- forumule Delhi -->
        <div class="col-md-4 offset-md-1">

                <div class="card" style="width: 18rem;">

                        <img src="img/delhi.jpg" class="card-img-top" alt="...">

                        <div class="card-body">
                          <h5 class="card-title text-center">Formule Delhi</h5>
                          <p class="card-text">Poppadoms<br>
                                Agneau byriani<br>
                                Lassi mangue</p>
                          <a href="?menu=Delhi&prix=24&img=img/delhi.jpg" class="btn col-md-12 btn-warning">Choisir</a>
                        </div>
                </div>

        </div>

        <!-- formule Hanoi -->
        <div class="col-md-4 offset-md-2">

                <div class="card" style="width: 18rem;">

                        <img src="img/hanoi.jpg" class="card-img-top" alt="...">

                        <div class="card-body">
                          <h5 class="card-title text-center">Formule Hanoi</h5>
                          <p class="card-text">Nems aux crevettes<br>
                                Poulet saté<br>
                                Perles de coco</p>
                          <a href="?menu=Hanoi&prix=28&img=img/hanoi.jpg" class="btn col-md-12 btn-primary">Choisir</a>
                        </div>
                </div>

        </div>

    </section>

    <?php
        } else {
    ?>

    <!-- la  section, qui va accueillir le menu random -->
    <section id="commande">

        <h2>Merci pour votre commande !</h2>

        <!-- une row pour les deux colonnes qui vont suivre. l' addition des deux colonnes sera égale a 11 car je m' en laisse une pour jouer avec les margin-left...je ne vais pas utiliser le offset pour ce cas -->
        <div class="row image_texte">

            <div class="col-md-3"><img  class="image_commande" src="<?php echo $photo; ?>" alt=""></div>

            <div class="col-md-8 texte_commande">
                <p>Votre formule <?php echo $formule; ?> arrive dans quelques instants...<i class="fas fa-kiwi-bird"></i></p>
                <p>Nous vous souhaitons une bonne dégustation.</p>
                <p>Un café gourmand vous est proposé pour terminer votre pause gourmande en douceur.</p>
                <p class="addition">- Votre facture sera de <?php echo $prix; ?> €</p>
                <a href="index.php" class="btn col-md-12 btn-success">Choisir un autre menu</a>
            </div>
        </div>

        <!-- une colonne de 4, centrée avec le offset, pour l' image du pois + son texte du dessus -->
        
        <div class="col-md-4 offset-md-4 pois">

                <p class="addition">- Vous avez aimé ? <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>

                <img class="col-md-12 image_pois" src="img/pg.jpg" alt="">
        </div>


    </section>

    <?php
        }
    ?>

    <footer>

        <h5><i class="fas fa-kiwi-bird"></i>.....<i class="fas fa-kiwi-bird"></i>....<i class="fas fa-kiwi-bird"></i>...<i class="fas fa-kiwi-bird"></i>..<i class="fas fa-kiwi-bird"></i>. Au Pois Gourmand</h5>

    </footer>

    </div>
    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
</body>
</html>