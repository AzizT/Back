<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire Entreprise</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <!-- 
        - Réaliser un formulaire correspondant a la table 'employes' de la bdd entreprise ( sauf id_employes)
        - Controler en PHP que l' on receptionne bien tous les champs du formulaire
        - connexion bdd
        - traitement php/sql permettant l' insertion d' un employé a partir du formulaire
     -->

    <?php
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $bdd = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    if ($_POST) {
        // cette condition est mise pour ne permettre qu' un seul insert, sinon, a chaque rechargement de page, l' insert se répétera "betement".
        $resultat = $bdd->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('$_POST[prenom]', '$_POST[nom]','$_POST[sexe]','$_POST[service]','$_POST[date_embauche]','$_POST[salaire]')");

        echo '<div class="col-md-6 offset-md-3 alert alert-success text-center"> L\' employé <strong>' . $_POST['nom'] . '</strong> a bien été enregistré !</div>';
    }

    ?>

    <div class="container">

        <h2 class="display-4 text-center">Formulaire d' inscription</h2>

        <form class="col-md-4 offset-md-4 text-center" method="post" action="">

            <!-- le pseudo -->
            <div class="form-group">
                <label for="prenom">Votre prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prenom">
            </div>

            <div class="form-group">
                <label for="nom">Votre nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom">
            </div>

            <div class="form-group">
                <label for="sexe">Sexe</label>
                <select id="sexe" class="form-control" name=" sexe">
                    <option selected value='f'>Femme</option>
                    <option value='m'>Homme</option>
                </select>
            </div>

            <div class="form-group">
                <label for="service">Votre service</label>
                <input type="text" class="form-control" id="service" name="service" placeholder="Votre service">
            </div>

            <div class="form-group">
                <label for="date_embauche">Votre date d' embauche</label>
                <input type="date" class="form-control" id="date_embauche" name="date_embauche" placeholder="Votre date d' embauche">
            </div>

            <div class="form-group">
                <label for="salaire">Votre salaire</label>
                <input type="text" class="form-control" id="salaire" name="salaire" placeholder="Votre salaire">
            </div>

            <!-- le bouton submit -->
            <button type="submit" class="btn btn-primary">Sign in</button>

        </form>



    </div>


    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>