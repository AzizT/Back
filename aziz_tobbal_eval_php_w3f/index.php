<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title></title>

</head>

<body>

    <?php

    $msg = "";


    if ($_POST) {

        // le titre
        if (!isset($_POST['titre']) || iconv_strlen($_POST['titre']) < 5 || iconv_strlen($_POST['titre']) > 50) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre titre entre 5 et 50 caractères</div>';
        }
        // iconv permet de ne compter que les caracteres, alors qur strlen va compter les caracteres spéciaux aussi, comme un accent ( qui ne sera pas compté car au dessus d' un autre caractere)

        // l' adresse
        if (!isset($_POST['adresse']) || iconv_strlen($_POST['adresse']) < 2 || iconv_strlen($_POST['adresse']) > 50) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre adresse entre 2 et 50 caractères</div>';
        }

        // la ville
        if (!isset($_POST['ville']) || iconv_strlen($_POST['ville']) < 2 || iconv_strlen($_POST['ville']) > 30) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre ville entre 2 et 30 caractères</div>';
        }

        // le code postal
        if (!is_numeric($_POST['cp']) || iconv_strlen($_POST['cp']) !== 5) {
            $msg .= '<div class="alert alert-warning text-danger">Veuillez saisir 5 chiffres pour le code postal</div>';
        }

        // la surface
        if (!is_numeric($_POST['surface']) || iconv_strlen($_POST['surface']) < 1 || iconv_strlen($_POST['surface']) > 5) {
            $msg .= '<div class="alert alert-warning text-danger">Veuillez saisir une surface de maximum 5 chiffres ( max 99 999 m2)</div>';
        }

        // le prix
        if (!is_numeric($_POST['surface']) || iconv_strlen($_POST['surface']) < 2 || iconv_strlen($_POST['surface']) > 9) {
            $msg .= '<div class="alert alert-warning text-danger">Veuillez saisir un prix compris entre 3 et 9 chiffres ( min 100 - max 999 999 999 m2)</div>';
        }

        // le type
        if (!isset($_POST['type']) || $_POST['type'] != "f" && $_POST['type'] != "location" && $_POST['type'] != "vente") {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez choisir un type ( une location ou une vente) </div>';
        }





        echo $msg;

        if (empty($msg)) {
            // si notre variable $msg est vide (empty), c' est a dire qu' elle n' a stocké aucune valeur, donc aucune erreur, alors c' est que tout est ok
            echo '<div class="alert alert-success text-dark">Félicitations, votre formulaire est valide et par conséquent transmis</div>';

            $bdd = new PDO(
                'mysql:host=localhost;dbname=immobilier',
                'root',
                '',
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
                )
            );


            $insert_bdd = $bdd->prepare("INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description) VALUES( :titre, :adresse, :ville, :cp, :surface, :prix, :photo, :type, :description)");



            $insert_bdd->bindValue(":titre", $_POST['titre'], PDO::PARAM_STR);

            $insert_bdd->bindValue(":adresse", $_POST['adresse'], PDO::PARAM_STR);

            $insert_bdd->bindValue(":ville", $_POST['ville'], PDO::PARAM_STR);

            $insert_bdd->bindValue(":cp", $_POST['cp'], PDO::PARAM_STR);

            $insert_bdd->bindValue(":surface", $_POST['surface'], PDO::PARAM_STR);

            $insert_bdd->bindValue(":prix", $_POST['prix'], PDO::PARAM_STR);

            $insert_bdd->bindValue(":photo", $_POST['photo'], PDO::PARAM_STR);

            $insert_bdd->bindValue(":type", $_POST['type'], PDO::PARAM_STR);

            $insert_bdd->bindValue(":description", $_POST['description'], PDO::PARAM_STR);

            $insert_bdd->execute();
        }




        // Volontairement, j' affiche ici le tableau récapitulatif des données insérées car je n' arrive pas a l' afficher dans l' autre page

        foreach ($bien_immo as $key => $tab) {
            echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center ">';
            foreach ($tab as $key2 => $value) {
                echo "$key2 : $value .<hr>";
            }
            echo '</div>';
        }
    }


    ?>

    <!-- fin*************************************** -->

    <h1 class="display-4 text-center">Formulaire ajout bien immobilier</h1>

        <form class="mt-4 mb-4 ml-4" method="post" action="affichage_biens.php">
            <!-- mais si' j' envoie vers l' autre page, mes conditions de vérification ne sont plus respectées, obligatoires, alors qu' elles fonctionnaient sans cette "action" -->

            <!-- le titre -->
            <div class="form-group col-md-2">
                <label for="titre">Votre titre</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Votre titre">
            </div>

            <!-- l' adresse -->
            <div class="form-group col-md-2">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse du logement">
            </div>

            <!-- la ville -->
            <div class="form-group col-md-2">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville...">
            </div>

            <!-- le code-postal -->
            <div class="form-group col-md-2">
                <label for="cp">Code postal</label>
                <input type="text" class="form-control" id="cp" name="cp" placeholder="Code Postal">
            </div>

            <!-- la surface -->
            <div class="form-group col-md-2">
                <label for="surface">Surface</label>
                <input type="text" class="form-control" id="surface" name="surface" placeholder="Surface du logement">
            </div>

            <!-- le prix -->
            <div class="form-group col-md-2">
                <label for="prix">Prix</label>
                <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix du logement">
            </div>

            <!-- la photo -->
            <div class="form-group col-md-2">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" aria-describedby="" name="photo">
            </div>

            <!-- le type -->
            <div class="form-group col-md-2">
                <label for="type">Type</label>
                <select id="type" class="form-control" name="type">
                    <option value="location" selected>Location</option>
                    <option value="vente">Vente</option>
                </select>

                <!-- zone de texte -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
            </div>

            <!-- le bouton submit -->
            <button type="submit" class="btn btn-primary">Envoyer</button>

        </form>


        <!-- bibliotheque pour bootstrap -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>