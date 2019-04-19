<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire inscription élève</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <?php
    echo '<pre style="background:teal;color:white;" >';
    var_dump($_POST);
    echo '</pre>';

    $msg_nom = "";
    $msg_prenom = "";
    $msg_classe = "";
    $msg_parent = "";
    $msg_telephone = "";
    $msg_valid = "";


    if ($_POST) {
        // extract($_POST);
        // extract permet de raccourcir, simplifier la syntaxe (exemple ligne 2 pourle nom) + peut ecrirre empty comme !isset

        // le nom
        if (!isset($_POST['nom']) || iconv_strlen($_POST['nom']) < 2 || iconv_strlen($_POST['nom']) > 30) {
            // if (empty($nom) || iconv_strlen($nom) < 2 || iconv_strlen($nom) > 30) {
            $msg_nom .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre pseudo entre 2 et 30 caractères</div>';
        }

        // le prenom
        if (!isset($_POST['prenom']) || iconv_strlen($_POST['prenom']) < 2 || iconv_strlen($_POST['prenom']) > 30) {
            $msg_prenom .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre prenom entre 2 et 30 caractères</div>';
        }

        // la classe
        if (!isset($_POST['classe']) || iconv_strlen($_POST['classe']) < 2 || iconv_strlen($_POST['classe']) > 30) {
            $msg_classe .= '<div class="alert alert-warning text-danger"> Veuillez saisir la classe entre 2 et 30 caractères</div>';
        }

        // le parent
        if (!isset($_POST['parent']) || iconv_strlen($_POST['parent']) < 2 || iconv_strlen($_POST['parent']) > 30) {
            $msg_parent .= '<div class="alert alert-warning text-danger"> Veuillez saisir le nom du parent entre 2 et 30 caractères</div>';
        }

        // le telephone
        if (!preg_match('#^[0-9]{10}+$#', $_POST['telephone'])) {
            // preg_match est une expression réguliere (regex) qui toujours entourée de # afin de préciser les options
            /*
        ^ indique le début de la chaine
        $ indique la fin de la chaine
        + est ici pour dire que les caracteres peuvent etre utilisés plusieurs fois
        */
            $msg_telephone .= '<div class="alert alert-warning text-danger"> Veuillez entrer votre numéro de téléphone de 10 chiffres</div>';
        }

        if (empty($msg_nom || $msg_prenom || $msg_classe || $msg_parent || $msg_telephone)) {
            // les deux syntaxes sont ok (dessus moi, dessous; alpha, a prendre en priorité)
            // if (empty($msg_nom) && ($msg_prenom) && ($msg_classe) && ($msg_parent) && ($msg_telephone)) {
            // si aucun message d' erreur, message de validation, ci dessous, puis on passe a la connexion


            // 1 - Je me connect
            $pdo = new PDO(
                'mysql:host=localhost;dbname=eleve',
                'root',
                '',
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
                )
            );

            //2 - Je prépare l'insertion des valeur saisies dans les champs du formulaire
            $requet = $pdo->prepare("INSERT INTO fiche (nom,prenom,classe,parent,telephone) VALUES (:nom,:prenom,:classe,:parent,:telephone)");
            $requet->bindValue(':nom', $_POST['nom']);
            // $requet->bindValue(':nom', $nom);
            // ligne cidessus si on utilise l' extract
            $requet->bindValue(':prenom', $_POST['prenom']);
            $requet->bindValue(':classe', $_POST['classe']);
            $requet->bindValue(':parent', $_POST['parent']);
            $requet->bindValue(':telephone', $_POST['telephone']);
            /*
                test de sylvain avec une boucle foreach
                foreach($_POST as $key => $value)
                {
                    $requet -> bindValue(":key, $value, PDO::PARAM_STR)
                }
                */
            // J'execute l'insertion en BDD
            $requet->execute();

            $msg_valid .= '<div class="alert alert-success">Le formulaire est validé.</div>';

            $resultat = $pdo->query("SELECT * FROM fiche");
            $eleves = $resultat->fetchAll(PDO::FETCH_ASSOC);

            echo "<pre>";
            print_r($eleves);
            echo "</pre>";
        }
    } // FIN if ($_POST)



    ?>

    <form class="ml-2 mt-4 mb-4" method="post" action="">

        <?= '<div class="alert al ert-succes s">' . $msg_valid . '</div>'; ?>

        <!-- le nom -->
        <div class="form-group mx-auto  col-md-2">
            <label for="nom">Nom de l' élève</label>
            <?= $msg_nom; ?>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom">
        </div>

        <!-- le prenom -->
        <div class="form-group mx-auto  col-md-2">
            <label for="prenom">Prénom de l' élève</label>
            <?= $msg_prenom; ?>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prenom">
        </div>

        <!-- la classe -->
        <div class="form-group mx-auto  col-md-2">
            <label for="classe">Classe de l' élève</label>
            <?= $msg_classe; ?>
            <input type="text" class="form-control" id="classe" name="classe" placeholder="Classe de l' élève">
        </div>

        <!-- le parent -->
        <div class="form-group mx-auto  col-md-2">
            <label for="parent">Parent a contacter</label>
            <?= $msg_parent; ?>
            <input type="text" class="form-control" id="parent" name="parent" placeholder="Parent a contacter">
        </div>

        <!-- le telephone -->
        <div class="form-group mx-auto  col-md-2">
            <label for="telephone">Téléphone domicile</label>
            <?= $msg_telephone; ?>
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Télephone domicile">
        </div>


        <!-- le bouton submit -->
        <div class="form-group mx-auto col-md-2">
            <button type="submit" class="btn btn-warning">Valider</button>
        </div>

    </form>

</body>

</html>