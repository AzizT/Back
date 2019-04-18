<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TP 3.1 boucle de chiffres</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <?php
    $i = 0;
    while ($i <= 100) {
        echo "$i---";
        $i++;
    }
    echo '<br>';


    for ($i = 0; $i <= 100; $i++) {
        if ($i == 50) {
            echo '<span class="text-danger">' . "$i---" . '</span>';
        } else {
            echo "$i---";
        }
    }

    echo '<br>';

    $i = 2000;
    while ($i >= 1930) {
        echo "$i---";
        $i--;
    }
    echo '<br>';

    for ($i = 1; $i <= 10; $i++) {
        echo 'Titre a répéter 10 fois' . '<br>';
    }

    echo '<br>';

    for ($i = 1; $i <= 10; $i++) {
        echo 'Titre a répéter une '. $i .'è fois' . '<br>';
    }

    echo '<br>';
    ?>
</body>

</html>