<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire 1</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>

    <!-- exo: réaliser un formulaire BS avec mail, mdp et bouton submit -->

    <div class="container">

    <h1 class="display-4 text-center">Formulaire 1</h1>

    <?php
    echo '<pre>'; print_r($_POST); echo '</pre>';
    // va nous permettre de récupérer les données du formulaire
    // on va pouvoir observer les données saisies dans le formulaire qui vont se stocker directement dans la superglobale _POST, les indices correspondant aux attributs 'name' du formulaire html

    // exo: afficher les données saisies dans le formulaire en passant par la superglobale _POST ( affichage utilisateur, non avec un array et donc ne pas utiliser de print_r ou vardump)

    // deux méthodes
    foreach($_POST as $key => $value)
    // avec la foreach, rapide surtout si beaucoup de value a récupérer
    {
        echo "$key => $value<br>";
    }
    echo '<hr>';

    if($_POST)
    // permet d' éviter les messages d' erreur au chargement de la page. Le message d' erreur ne s' affichera que si on valide sans entrer de données dans le form. Mais plus au chargement de la page...sinon, deux erreurs UNDEFINED
    // Désormais, si la condition IF est vérifiée, si elle renvoie TRUE, cela veut dire que l' on a soumis le formulaire et les indices 'email' et 'mdp' sont bien detectés 
{
    echo "Email : $_POST[email]<br>";
    // autre méthode qui consiste a récupérer les données une par une en crochetant aux différents indices
    echo "Mot de passe : " . $_POST['mdp'] . "<br>";
}
    echo '<hr>';




    ?>

        <form class="col-md-4 offset-md-4" method="post" action="">
            <!--  method post est a privilégier par rapport a la method get -->
            <!-- la method, c' est la maniere dont vont circuler les données
                 Action sert a determiner l' URL de destination -->

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
            <!-- l' attribut name a NE SURTOUT PAS OUBLIER
                 sinon, aucune donnée saisie sur le formulaire ne sera récupérée en PHP -->
            </div>
            <div class="form-group">
                <label for="mdp">Password</label>
                <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>

    </div>




    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


</body>

</html> 