<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire Informations</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <?php
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $msg = "";


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

        // le code postal
        if (!is_numeric($_POST['codepostal']) || iconv_strlen($_POST['codepostal']) !== 5) {
            $msg .= '<div class="alert alert-warning text-danger">Veuillez saisir 5 chiffres</div>';
            // iconv permet de ne compter que les caracteres, alors qur strlen va compter les caracteres spéciaux aussi, comme un accent ( qui ne sera pas compté car au dessus d' un autre caractere)
        }

        // l' adresse
        if (!isset($_POST['adresse']) || strlen($_POST['adresse']) < 2 || strlen($_POST['adresse']) > 30) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre adresse entre 2 et 30 caractères</div>';
        }

        // le sexe
        if (!isset($_POST['sexe']) || $_POST['sexe'] != "f" && $_POST['sexe'] != "m" && $_POST['sexe'] != "n") {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez choisir un genre</div>';
        }



        echo $msg;
        // si je décide de ne pas declarer ma variable, je passe par la méthode echo de gregory, et on remplace $msg .= par echo
        if (empty($msg)) {
            // si notre variable $msg est vide (empty), c' est a dire qu' elle n' a stocké aucune valeur, donc aucune erreur, alors c' est que tout est ok
            echo '<div class="alert alert-success text-dark">Félicitations, votre formulaire est valide et par conséquent transmis</div>';

            $bdd = new PDO(
                'mysql:host=localhost;dbname=repertoire',
                'root',
                '',
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
                )
            );
        

        $insert_bdd = $bdd->prepare("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES(:nom, :prenom, :telephone, :profession, :ville, :codepostal, :adresse, :date_de_naissance, :sexe, :description)");



        $insert_bdd->bindValue(":nom", $_POST['nom'], PDO::PARAM_STR);

        $insert_bdd->bindValue(":prenom", $_POST['prenom'], PDO::PARAM_STR);

        $insert_bdd->bindValue(":telephone", $_POST['telephone'], PDO::PARAM_STR);

        $insert_bdd->bindValue(":profession", $_POST['profession'], PDO::PARAM_STR);

        $insert_bdd->bindValue(":ville", $_POST['ville'], PDO::PARAM_STR);

        $insert_bdd->bindValue(":codepostal", $_POST['codepostal'], PDO::PARAM_STR);

        $insert_bdd->bindValue(":adresse", $_POST['adresse'], PDO::PARAM_STR);

        $insert_bdd->bindValue(":date_de_naissance", $_POST['date_de_naissance'], PDO::PARAM_STR);

        $insert_bdd->bindValue(":sexe", $_POST['sexe'], PDO::PARAM_STR);

        $insert_bdd->bindValue(":description", $_POST['description'], PDO::PARAM_STR);

        $insert_bdd->execute();

        }

        //  tableau non conventionnel récapitulatif de toutes les données insérées dans ma bdd
        $resultat = $bdd->query("SELECT * FROM annuaire");
            $employe = $resultat->fetchAll(PDO::FETCH_ASSOC);

            echo "<pre>";
            print_r($employe);
            echo "</pre>";

        

        // afficher successivement les données de chaque employé avec une boucle foreach

        foreach ($employe as $key => $tab) {
            echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center ">';
            foreach ($tab as $key2 => $value) {
                echo "$key2 : $value .<hr>";
            }
            echo '</div>';
        }

        // insertion via le fichier

            // cette condition est mise pour ne permettre qu' un seul insert, sinon, a chaque rechargement de page, l' insert se répétera "betement".
            $insert_bdd = $bdd->exec("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES('Aribot', 'Yannis', '7896541023', 'web developpeur', 'Créteil', 94000, 'Pas loin de l hosto', '1990-03-06', 'm', 'Hedgehog')");
            echo "nombre d' enregistrement affecté(s) par l' INSERT : $insert_bdd <br>";
            echo "dernier ID généré : " . $bdd->lastInsertId() . '<hr>';
            // lastInsertId va nous permettre d' afficher le dernier ID généré

            // $insert_bdd = $bdd->exec("UPDATE employes SET salaire = 1300 WHERE id_employes = 350 ");
            // echo "nombre d' enregistrement affecté(s) par l' UPDATE : $insert_bdd <br>";
            // $resultat contient un integer. Il garde en mémoire le nombre de modifications. Mais on ne peut l' associer directement a exec ou query. Par contre on lm' appelle dans l' echo pour "déstocker" l' integer qu' il a en  mémoire dont on a besoin
    
            // DELETE supprimer employé 350
    
            // $insert_bdd = $bdd->exec("DELETE FROM employes WHERE id_employes = 350 ");
            // echo "nombre d' enregistrement affecté(s) par le DELETE : $insert_bdd <br>";
    
            // echo '<hr><h2 class="display-4 text-center">03. PDO : SELECT + FETCH_ASSOC (1 seul résultat)</h2><hr>';
        
    }


    ?>

    <form class="mt-4 mb-4 ml-4" method="post" action="">

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