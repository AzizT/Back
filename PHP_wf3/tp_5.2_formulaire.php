<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire Informations</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- link pour fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">

</head>

<body>

    <?php
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $bdd = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $msg = "";

    foreach ($_POST as $key => $value) {
        echo "$key => $value<br>";
    }


    if ($_POST) {

        // le nom
        if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 30) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre pseudo entre 2 et 30 caractères</div>';
        }

        // le prenom
        if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 30) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre prenom entre 2 et 30 caractères</div>';
        }

        // le telephone
        if (!preg_match('#^[0-9]{10}+$#', $_POST['telephone'])) {
            // preg_match est une expression réguliere (regex) qui toujours entourée de # afin de préciser les options
            /*
        ^ indique le début de la chaine
        $ indique la fin de la chaine
        + est ici pour dire que les caracteres peuvent etre utilisés plusieurs fois
        */
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez entrer votre numéro de téléphone de 10 chiffres</div>';
        }

        // la profession
        if (!isset($_POST['profession']) || strlen($_POST['profession']) < 2 || strlen($_POST['profession']) > 30) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre profession entre 2 et 30 caractères</div>';
        }

        // la ville
        if (!isset($_POST['ville']) || strlen($_POST['ville']) < 2 || strlen($_POST['ville']) > 30) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre ville entre 2 et 30 caractères</div>';
        }

        if (!is_numeric($_POST['codePostal']) || iconv_strlen($_POST['codePostal']) !== 5) {
            $msg .= '<div class="alert alert-warning text-danger">Veuillez saisir 5 chiffres</div>';
            // iconv permet de ne compter que les caracteres, alors qur strlen va compter les caracteres spéciaux aussi, comme un accent ( qui ne sera pas compté car au dessus d' un autre caractere)
        }

        // l' adresse
        if (!isset($_POST['adresse']) || strlen($_POST['adresse']) < 2 || strlen($_POST['adresse']) > 30) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre adresse entre 2 et 30 caractères</div>';
        }

        if (!isset($_POST['sexe']) || $_POST['sexe'] != "f" && $_POST['sexe'] != "h" && $_POST['sexe'] != "n") {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez choisir un genre</div>';
        }



        echo $msg;
        // si je décide de ne pas declarer ma variable, je passe par la méthode echo de gregory, et on remplace $msg .= par echo
        if (empty($msg)) {
            // si notre variable $msg est vide (empty), c' est a dire qu' elle n' a stocké aucune valeur, donc aucune erreur, alors c' est que tout est ok
            echo '<div class="alert alert-success text-dark">Félicitations, votre formulaire est valide et par conséquent transmis</div>';
        }

        $insert_bdd = $bdd->prepare("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES(:nom, :prenom,:telephone,:profession,:ville,:codepostal,:adresse,:date_de_naissance,:sexe),:description");

        echo '<div class="col-md-6 offset-md-3 alert alert-success text-center"> L\' employé <strong>' . $_POST['nom'] . '</strong> a bien été enregistré !</div>';
    }


    ?>

    <form class="ml-2 mt-4 mb-4" method="post" action="">

        <!-- le nom -->
        <div class="form-group col-md-2">
            <label for="nom">Votre nom *</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom">
        </div>

        <!-- le prenom -->
        <div class="form-group col-md-2">
            <label for="prenom">Votre prénom *</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prenom">
        </div>

        <!-- le telephone -->
        <div class="form-group col-md-2">
            <label for="telephone">Téléphone *</label>
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Votre numéro de télephone...">
        </div>

        <!-- la profession -->
        <div class="form-group col-md-2">
            <label for="profession">profession</label>
            <input type="text" class="form-control" id="profession" name="profession" placeholder="Votre profession...">
        </div>

        <!-- la ville -->
        <div class="form-group col-md-2">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" placeholder="Votre ville...">
        </div>

        <!-- le code-postal -->
        <div class="form-group col-md-2">
            <label for="codepostal">Code postal</label>
            <input type="text" class="form-control" id="codepostal" name="codepostal">
        </div>

        <!-- l' adresse -->
        <div class="form-group col-md-2">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Votre adresse...">
        </div>

        <!-- date de naissance -->
        <div class="form-group col-md-2">
            <label for="date_de_naissance">Date de naissance</label><br>
            <input type="date" id="date_de_naissance" name="date_de_naissance" value="">
        </div>

        <!-- le sexe -->
        <div class="form-group col-md-2">
            <label for="sexe">Sexe</label>
            <select id="sexe" class="form-control" name=" sexe">
                <option value="f" selected>Femme</option>
                <option value="m">Homme</option>
                <option value="n">Neutre</option>
            </select>

            <!-- zone de texte -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
        </div>







        <!-- le bouton submit -->
        <button type="submit" class="btn btn-primary">Sign in</button>

    </form>

</body>

</html>