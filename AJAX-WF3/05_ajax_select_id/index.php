<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>05 Ajax Select ID</title>

    <!-- link Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <h1 class="display-4 text-center">Selectionner un ID</h1>

        <!-- 1 - réaliser un selecteur en php qui regroupe tous les prenoms des employes, avec un bouton "afficher" -->

        <form method="post" action="" class="row offset-md-5 mt-4">



            <div id="employes">


                <?php

                require_once("init.php");





                $resultat = $bdd->query("SELECT * FROM employes");





                // réaliser un selecteur en php avec les noms de topusles employés
                echo '<select class="col-md-12" id="personne" name="personne">';
                while ($employe = $resultat->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='$employe[id_employes]'>$employe[nom]</option>";
                }
                echo '</select>';

                ?>





            </div>

            <input type="submit" class="col-md-2 ml-2 btn btn-dark" id="submit" value="supprimer" placeholder="Prénom a insérer">
        </form>

        <div id="resultat">
            <!-- 2 - réaliser le script php permettant d' afficher l' ensemble de la table employes -->

            <?php $resultat = $bdd->query("SELECT * FROM employes"); ?>
            <table class="table table-bordered mt-4"><tr>
                <?php for ($i = 0; $i < $resultat->columnCount(); $i++) :
                    $colonne = $resultat->getColumnMeta($i); ?>
                    <th><?= $colonne['name'] ?></th>
                <?php endfor; ?>
                </tr>
                <?php while ($employe = $resultat->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <?php foreach ($employe as $value) :?>
                    <td><?= $value ?></td>
                    <?php endforeach ?>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>

    </div>


    <!-- cdn jquery
    https://code.jquery.com/
    la 3.4.1, minified -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- lien de mon fichier js -->
    <script src="ajax5.js"></script>
</body>

</html>