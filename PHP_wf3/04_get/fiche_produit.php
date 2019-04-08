<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche produit</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container text-center">

        <h1 class="displayed-4 text-center">Détail du Produit n° <strong class="text-info"><?= $_GET['id'] ?></strong></h1>

        <?php
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
        //GET va nous permettre de récupérer toutes les infos mises dans l' URL de boutique.php et les transmettre dans un array vers la fiche produit concerné

        // exo
        // afficher les données t ransmises dans l' URL avec un affichage conventionnel en excluant l ' indice 'id'

        echo'<div class="col-md-4 offset-md-4 mx-auto text-center alert alert-info">';

        foreach($_GET as $key => $value)
        {
            if($key !='id'){
                // si ma variable est différente de 'id', alors echo la suite....=> me permet d' exclure l' indice id
                echo"<strong>$key</strong> : $value<br>";
            }
        }
        
        echo'</div>';

        // correction de djamila => bonne méthode si pas beaucoup d' infos, sinon, prendre celle de grégory ci dessus qu permet d' exculre un champ plutot que d' en détailler plusieurs

        // if($_GET){
        //     echo "type => $_GET[type]<br>";
        //     echo "couleur => $_GET[couleur]<br>";
        //     echo "prix => $_GET[prix]<br>";
        // }
            
        ?>

        <a href="boutique.php">Retour vers l' accueil boutique</a>

    </div>

    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>