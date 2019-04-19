<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil Phoenix</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- link fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- link vers mon css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid">

        <header class=" col-md-12 bg-info-transparent fixed-top">

            <nav class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                    <a class="navbar-brand" href="#"><i class="fab fa-phoenix-framework"></i></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Phoenix <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Choisir une destination</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Payer</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </nav>

        </header>

        <?php
        if (empty($_GET)) {
            ?>

            <main>

                <!-- slider------------------------------------------------------------ -->
                <div class="row">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/caraibes1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/maldives.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/maurice.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>

                <!-- btn choisir------------------------------------------ -->

                <div class="container">
                    <button type="button" class="btn btn-block btn-outline-info text-center">Choisir mon séjour tout de suite !</button>
                </div>

            </main>
        <?php
    } else {
        ?>

        <?php
    } else {
        ?>
            <!-- a partir d' ici tout ce qui est caché de la page accueil, et qui n' apparaitra qu' au clic-->




            <!-- fin des parties cachées -->
        <?php
    }
    ?>

        <!-- footer avec navigation -->

        <div class="row">

            <footer class="col-md-12 pt-2 pb-2 bg-info">

                <div class="container">
                    <div class="row">
                        <a href="" class="text-secondary"><i class="fas fa-umbrella-beach"></i> Vos vacances de reve ...</a>
                        <a href="" class="text-secondary"><i class="fas fa-sun"></i> Plage ...</a>
                        <a href="" class="text-secondary"><i class="fas fa-city"></i> Urbaine ...</a>
                        <a href="" class="text-secondary"><i class="fas fa-anchor"></i> Croisière ...</a>
                        <a href="" class="text-secondary"><i class="fas fa-mountain"></i> Montagne ...</a>
                        <a href="" class="text-secondary"><i class="fas fa-euro-sign"></i> A prix tout doux ... <i class="fas fa-umbrella-beach"></i></a>
                    </div>
                </div>

        </div>

        </footer>



    </div>



    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


</body>

</html>