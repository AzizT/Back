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
    <!-- 1- réaliser un formulaire html avec les champs suivants: pseudo, mdp, confirmer mdp, nom, prenom, email, sexe, téléphone, adresse, ville, code-postal, et un bouton             submit
         2- controler en php que' lon receptionne bien toutes les données du formulaire
         3- faites e, sorte d' informer l' internaute si le pseudo n' est pas compris entre 2 et 20 caracteres
         4- faire en sorte d' informer l' internaute si les mots de passes ne sont pas identiques
         5- faire en sorte d' informaer l' internaute si l' email n' est pas au bon format (fonction prédéfinie filter_var)
         6- faire en sorte d' informer l' internaute si le code n' est pas de type numérique (fonction prédéfinie: is_numeric) et s' il est différent de 5 caracteres
         7- faire en sorte d' informer l' internaute si le champs du nom est laissé vide
         8- " " " " " si le champ téléphone n' est pas valide fonction prédéfinie => preg_match
         9- " " " " " si il a correctement rempli l' internaute -->

         <div class="container">

         <?php
    echo '<pre>'; print_r($_POST); echo '</pre>';

    foreach($_POST as $key => $value)
    {
        echo "$key => $value<br>";
    }

    $msg = "";
    

if($_POST)
{
        if (!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 2 || strlen($_POST['pseudo']) > 20) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre pseudo entre 2 et 20 caractères</div>';
        }

        // if (iconv_strlen($_POST['pseudo']) < 2 || iconv_strlen($_POST['pseudo']) > 20) {
        // echo '<div class="alert alert-warning text-danger"> Veuillez saisir votre pseudo  entre 2 et 20 caractères</div>';
        // }
        // les deux méthodes ci dessus sont équivalentes

        if ($_POST['password'] !== $_POST['password2']) {
            $msg .= '<div class="alert alert-warning text-danger">Vos mots de passe doivent etre identiques</div>';
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $msg .= '<div class="alert alert-warning text-danger">Votre Email n\' est pas valide</div>';
        }
        if(!is_numeric($_POST['codePostal']) || iconv_strlen($_POST['codePostal']) !== 5){
            $msg .= '<div class="alert alert-warning text-danger">Veuillez saisir 5 chiffres</div>';
            // iconv permet de ne compter que les caracteres, alors qur strlen va compter les caracteres spéciaux aussi, comme un accent ( qui ne sera pas compté car au dessus d' un autre caractere)
        }
        if (empty($_POST['nom'])) {
            $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre nom</div>';
        }

        if (!preg_match('#^[0-9]{10}+$#', $_POST['telephone'])) {
        // preg_match est une expression réguliere (regex) qui toujours entourée de # afin de préciser les options
        /*
        ^ indique le début de la chaine
        $ indique la fin de la chaine
        + est ici pour dire que les caracteres peuvent etre utilisés plusieurs fois
        */
        $msg .= '<div class="alert alert-warning text-danger"> Veuillez entrer votre numéro de téléphone de 10 chiffres</div>';
        }

        echo $msg;
    // si je décide de ne pas declarer ma variable, je passe par la méthode echo de gregory, et on remplace $msg .= par echo
    if(empty($msg)){
        // si notre variable $msg est vide (empty), c' est a dire qu' elle n' a stocké aucune valeur, donc aucune erreur, alors c' est que tout est ok
        echo '<div class="alert alert-success text-dark">Félicitations, votre formulaire est valide et par conséquent transmis</div>';
    }
} 


    

    ?>

             <form method="post" action="">

             <!-- le pseudo -->
             <div class="form-group">
                 <label for="text">Votre pseudo</label>
                <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo">
            </div>
            
             <!-- le mdp -->
             <div class="form-group">
                <label for="password">Votre mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="mot de passe">
             </div>

             <!-- confirmer le mdp -->
             <div class="form-group">
                <label for="password2">Confirmez votre mot de passe</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="mot de passe">
             </div>

             <!-- le nom -->
            <div class="form-group">
                <label for="text">Votre nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Votre nom">
            </div>

            <!-- le prenom -->
            <div class="form-group">
                <label for="text">Votre prénom</label>
                <input type="text" class="form-control" name="prenom" placeholder="Votre prenom">
            </div>
  

             <!-- le mail -->
            <div class="form-group">
                <label for="email">Votre adresse mail</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Adresse mail">
                <!-- pour le type, mettre un text au lieu de email, pour pouvoir faire une vérification php sur le navigateur -->
            </div>

            <!-- le sexe -->
            <div class="form-group col-md-4">
                <label for="inputSexe">Sexe</label>
                <select id="inputSexe" class="form-control" name=" sexe">
                    <option selected>Femme</option>
                    <option>Homme</option>
                </select>
            </div>

            <!-- le telephone -->
            <div class="form-group col-md-4">
                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Votre numéro de télephone...">
            </div>

            <!-- l' adresse -->
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="adresse" id="inputAddress" placeholder="Votre adresse...">
            </div>

            <!-- la ville -->
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="inputCity" name="ville" placeholder="Votre ville...">
            </div>

            <!-- le code-postal -->
            <div class="form-group col-md-2">
                <label for="codePostal">Code postal</label>
                <input type="text" class="form-control" id="codePostal" name="codePostal">
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