<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookie PHP</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container text-center">


        <h1 class="display-4 text-center">COOKIE PHP</h1>

        <?php
        if (isset($_GET['pays'])) {
            $pays = $_GET['pays'];
            // les parametres affichés pour la première fois sont ceux du pays du site (clic sur un lien trouvé)
        } elseif (isset($_COOKIE['pays'])) {
            // désormais, les parametres affichés seront ceux du pays sur lequel on aura cliqué ( lorsqu' on y reviendra plus tard)
            $pays = $_COOKIE['pays'];
        } else {
            $pays = 'fr';
            // dans le cas ou on efface ses cookies ou si le cookie périme au bout d' un an. Ici, par défaut on indique qu' en cas d' absence de cookie, la valeur par défaut sera 'fr'
        }
        // creation d' un fichier cookie
        $un_an = 365 * 24 * 3600;
        // correspond a une année en secondes => la durée de vie de notre cookie
        setcookie("pays", $pays, time() + $un_an);
        // permet de créer un fichier cookie qui sera conservé coté client, c' est a dire dans son ordinateur
        // setcookie demande trois arguments: nom du cookie, sa valeur et sa durée de vie

        // le cookie est un fichier conservé coté client, c-a-d sur le pc de l' utilisateur ( i y contient des données "sensibles" telles que: dernier article consulté, langue préférée du site etc...)

        echo '<pre>';
        print_r($_COOKIE);
        echo '</pre>';

        switch ($pays) {
            case 'fr':
                echo 'Vous etes sur un site en français<br>';
                break;
            case 'es':
                echo 'Vous etes sur un site en espagnol<br>';
                break;
            case 'an':
                echo 'Vous etes sur un site en anglais<br>';
                break;
            case 'dz':
                echo 'Vous etes sur un site en arabe<br>';
                break;
        }
        // le détail des cookies sur  CHROME s' affiche ici chrome://settings/siteData
        ?>

        <h2>Votre langue : </h2>

        <ul class="col-md-2 offset-md-5 list-group">
            <li class="list-group-item"><a href="?pays=fr">France</a></li>
            <li class="list-group-item"><a href="?pays=es">Espagne</a></li>
            <li class="list-group-item"><a href="?pays=an">Angleterre</a></li>
            <li class="list-group-item"><a href="?pays=dz">Algérie</a></li>
        </ul>

    </div>



    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>