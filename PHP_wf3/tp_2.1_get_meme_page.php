<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TP 2.1 GET URL</title>
</head>

<body>


    <ul class="col-md-2 offset-md-5 list-group">
        <li class="list-group-item"><a href="?pays=fr">France</a></li>
        <li class="list-group-item"><a href="?pays=it">Italie</a></li>
        <li class="list-group-item"><a href="?pays=es">Espagne</a></li>
        <li class="list-group-item"><a href="?pays=dz">Algérie</a></li>
    </ul>

    </div>
    <?php

    if(isset($_GET['pays']))
    switch ($_GET['pays']) {
        case 'fr':
            echo 'Vous etes Français ?<br>';
            break;
        case 'it':
            echo 'Vous etes Italien ?<br>';
            break;
        case 'es':
            echo 'Vous etes Espagnol ?<br>';
            break;
        case 'dz':
            echo 'Vous etes Algérien ?<br>';
            break;
    }
    ?>

</body>

</html>