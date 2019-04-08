<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire Fruits PHP</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- 
        exo: 
             - réaliser un formulaire html permettant de selectionner un fruit, liste déroulante, et de saisir un poids, champ input
             - afficher le prix en passant par la fonction calcul
             - faire en sorte de garder le dernier fruit sélectionné, et le dernier poids saisi dans le formulaire lorsque celui ci est validé
     -->





    <div class="container text-center">

        <h1 class="display-4">Formulaire Fruits</h1>

        <?php
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        require_once('focntion.php');
        if ($_POST) {
            echo calcul($_POST['fruit'], $_POST['poids']) . '<hr>';
        }
        ?>

        <form class="col-md-4 offset-md-4" method="post" action="">

            <div class="form-group">
                <label for="fruit">Choisissez un fruit</label>
                <select class="form-control" id="fruit" name="fruit">
                    <option value="cerises" <?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'cerises') echo 'selected' ?>>Cerises</option>
                    <option value="bananes" <?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'bananes') echo 'selected' ?>>Bananes</option>
                    <option value="pommes" <?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'pommes') echo 'selected' ?>>Pommes</option>
                    <!-- la même en ternaire -->
                    <option value="pommes" <?= (isset($_POST['fruit']) && $_POST['fruit'] == 'pommes') ? 'selected' : ''; ?>>Pommes</option>
                    <option value="peches" <?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'peches') echo 'selected' ?>>Peches</option>
                </select>
            </div>

            <div class="form-group">
                <label for="poids">Inscrivez le poid</label>
                <input type="text" class="form-control" id="poids" name="poids" placeholder="poids en grammes" value="<?php if (isset($_POST['poids'])) echo $_POST['poids'] ?>"> </div>
            <!-- la value qu' on entre va permettre de garder la dernière valeur entrée -->

            <button type="submit" class="col-md-12 btn btn-dark mb-4">Calculer</button>


        </form>





    </div>

    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>