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

    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <div class="container">

        <header>

            <h1 class="offset-md-1"><i class="fas fa-kiwi-bird"></i> Au Pois Gourmand</h1>

        </header>

        <main>
            <?php
            if (empty($_GET)) {


                ?>

                <!-- les deux menus du haut -->
                <div class="row">

                    <!-- formule rome -->
                    <div class="col-md-4 offset-md-1 formule">

                        <img src="img/rome.jpg" alt="">

                        <h2>Formule Rome</h2>
                        <p>Tomates buratina<br>
                            Rizotto aux asperges<br>
                            Panna cotta</p>
                        <a href="?menu=Rome&prix=25&img=img/rome.jpg"><button type="button" class="col-md-12 btn btn-info">Choisir</button></a>

                    </div>

                    <!-- formule NY -->
                    <div class="col-md-4 offset-2 formule">

                        <img src="img/nyork.jpg" alt="">

                        <h2>Formule New York</h2>
                        <p>César salade<br>
                            Cheese burger<br>
                            Cheesecake</p>
                        <a href="?menu=New York&prix=23&img=img/nyork.jpg"><button type="button" class="col-md-12 btn btn-danger">Choisir</button></a>

                    </div>

                </div>

                <!-- les deux menus du bas -->
                <div class="row">

                    <!-- formule delhi -->
                    <div class="col-md-4 offset-md-1 formule">

                        <img src="img/delhi.jpg" alt="">

                        <h2>Formule Delhi</h2>
                        <p>Poppadoms<br>
                            Agneau byriani<br>
                            Lassi mangue</p>
                        <a href="?menu=Delhi&prix=24&img=img/delhi.jpg"><button type="button" class="col-md-12 btn btn-warning">Choisir</button></a>

                    </div>

                    <!-- formule hanoi -->
                    <div class="col-md-4 offset-md-2 formule">

                        <img src="img/hanoi.jpg" alt="">

                        <h2>Formule Hanoi</h2>
                        <p>Nems aux crevettes<br>
                            Poulet saté<br>
                            Perles de coco</p>
                        <a href="?menu=Hanoi&prix=28&img=img/hanoi.jpg"><button type="button" class="col-md-12 btn btn-primary">Choisir</button></a>

                    </div>

                </div>

            <?php
        } else {
            ?>

            </main>

            <!-- addtion -->

            <section id="addition">


                <h2 class="col-md-12">Merci pour votre commande !</h2>

                <div class="row">

                    <div class="col-md-3">

                        <img src="<?php echo $photo; ?>" alt="">

                    </div>

                    <div class="col-md-8 commande">

                        <h5>Votre formule <?php echo $formule; ?> arrive dans quelques instants...<i class="fas fa-kiwi-bird"></i></h5>
                        <p>Nous vous souhaitons une bonne dégustation<br><br>
                            Un café gourmand vous est proposé pour terminer votre pause gourmande en douceur.</p>
                        <p class="total">- Votre facture sera de <?php echo $prix; ?> €</p>
                        <a href="index.php"><button type="button" class="col-md-12 btn btn-success">Choisir un autre menu</button></a>

                    </div>


                </div>

            </section>

            <p class="col-md-4 offset-md-4 note">- Vous avez aimé ?<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
            <img class="col-md-4 offset-md-4" src="img/pg.jpg" alt="">

        <?php
    }
    ?>

        <footer>
            <h5><i class="fas fa-kiwi-bird"></i>.....<i class="fas fa-kiwi-bird"></i>....<i class="fas fa-kiwi-bird"></i>...<i class="fas fa-kiwi-bird"></i>..<i class="fas fa-kiwi-bird"></i>. Au Pois Gourmand </h5>
        </footer>


    </div>
    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


</body>

</html>