<!-- EXERCICE 1 : 

a- Créer un formulaire d'inscription (methode "POST") avec les champs :
=> Prenom
=> Nom
=> email
=> Adresse
=> cade postal
=> Genre (f/h)

b- Afficher dans un tableau PHP les valeurs saisies dans le formulaire.

c- Effectuer tous les contrôles des champs
-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire 2</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>


    <div class="container">

        <?php
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        foreach ($_POST as $key => $value) {
            echo "$key => $value<br>";
        }

        $msg = "";


        if ($_POST) {
            // le mail
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $msg .= '<div class="alert alert-warning text-danger">Votre Email n\' est pas valide</div>';
            }
            // le code postal
            if (!is_numeric($_POST['codePostal']) || iconv_strlen($_POST['codePostal']) !== 5) {
                $msg .= '<div class="alert alert-warning text-danger">Veuillez saisir 5 chiffres</div>';
                // iconv permet de ne compter que les caracteres, alors qur strlen va compter les caracteres spéciaux aussi, comme un accent ( qui ne sera pas compté car au dessus d' un autre caractere)
            }
            // le nom
            if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 100) {
                $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre nom ( entre 2 et 100 caractères)</div>';
            }
            // le prenom
            if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 100) {
                $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre prénom ( entre 2 et 100 caractères)</div>';
            }
            // l' adresse
            if (!isset($_POST['adresse']) || strlen($_POST['adresse']) < 3 || strlen($_POST['adresse']) > 100) {
                $msg .= '<div class="alert alert-warning text-danger"> Veuillez ecrire votre adresse, entre 3 et 100 caracteres</div>';
            }
            // le sexe
            if (!isset($_POST['sexe']) || $_POST['sexe'] != "f" && $_POST['sexe'] != "h") {
                $msg .= '<div class="alert alert-warning text-danger"> Veuillez choisir un genre</div>';
            }

            echo $msg;
            // si je décide de ne pas declarer ma variable, je passe par la méthode echo de gregory, et on remplace $msg .= par echo
            if (empty($msg)) {
                // si notre variable $msg est vide (empty), c' est a dire qu' elle n' a stocké aucune valeur, donc aucune erreur, alors c' est que tout est ok
                echo '<div class="alert alert-success text-dark">Félicitations, votre formulaire est valide et par conséquent transmis</div>';
            }
        }




        ?>

        <form method="post" action="">

            <!-- le prenom -->
            <div class="form-group">
                <label for="text">Votre prénom</label>
                <input type="text" class="form-control" name="prenom" placeholder="Votre prenom">
            </div>

            <!-- le nom -->
            <div class="form-group">
                <label for="text">Votre nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Votre nom">
            </div>

            <!-- le mail -->
            <div class="form-group">
                <label for="email">Votre adresse mail</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Adresse mail">
                <!-- pour le type, mettre un text au lieu de email, pour pouvoir faire une vérification php sur le navigateur -->
            </div>

            <!-- l' adresse -->
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="adresse" id="inputAddress" placeholder="Votre adresse...">
            </div>

            <!-- le code-postal -->
            <div class="form-group col-md-2">
                <label for="codePostal">Code postal</label>
                <input type="text" class="form-control" id="codePostal" name="codePostal">
            </div>

            <!-- le sexe -->
            <div class="form-group col-md-4">
                <label for="inputSexe">Sexe</label>
                <select id="sexe" class="form-control" name="sexe">
                    <option selected value="">-- genre --</option>
                    <option value="f">Femme</option>
                    <option value="h">Homme</option>
                </select>
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