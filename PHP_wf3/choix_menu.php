<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choix menu</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div>

       <h1>Votre commande</h1>

        <?php
        // echo '<pre>';
        // print_r($_GET);
        // echo '</pre>';
        //GET va nous permettre de récupérer toutes les infos mises dans l' URL de tp_2.3.php et les transmettre dans un array vers la fiche produit concerné

        // exo
        // afficher les données t ransmises dans l' URL avec un affichage conventionnel en excluant l ' indice 'id'

        // echo '<div>';

        // foreach ($_GET as $key => $value) {
        //         if ($key != 'id') {
        //             // si ma variable est différente de 'id', alors echo la suite....=> me permet d' exclure l' indice id
        //             echo "<strong>$key</strong> : $value<br>";
        //         }
        //     }

        // echo '</div>';

        // correction de djamila => bonne méthode si pas beaucoup d' infos, sinon, prendre celle de grégory ci dessus qu permet d' exculre un champ plutot que d' en détailler plusieurs

        if (isset($_GET['menu'])) {
            echo  "Vous avez choisi " . $_GET['menu'] . " : " . $_GET['entree'] . " , " . $_GET['plat'] . " , " . $_GET['dessert'] . " . Et cela vous coutera : " . $_GET['prix'] . " €" ."<br>";
        }

        ?>



    </div>


</body>

</html>