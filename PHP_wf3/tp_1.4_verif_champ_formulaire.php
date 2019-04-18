<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TP 1.4</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <?php

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $msg = '<div class="alert alert-warning text-danger"> Veuillez saisir votre pseudo ( entre 3 et 10 caractères)</div>';

    if ($_POST) {
        if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 10) {
            echo $msg;
        }
    }

    ?>

    <form method="post" action="">

        <!-- le pseudo -->
        <div class="form-group">
            <label for="pseudo">Votre pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo">
        </div>

        <!-- le mail -->
        <div class="form-group">
            <label for="email">Votre adresse mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Adresse mail">
            <!-- pour le type, mettre un text au lieu de email, pour pouvoir faire une vérification php sur le navigateur -->
        </div>

        <!-- le bouton submit -->
        <button type="submit" class="btn btn-primary">Sign in</button>

    </form>




</body>

</html>