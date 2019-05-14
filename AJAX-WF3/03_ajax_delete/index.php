<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>03 Ajax delete</title>

    <!-- link Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <h1 class="display-4 text-center mb-4">Supprimer un employé</h1>



        <form method="post" action="" class="mt-4">
 <div id="employes">
        <div class="row offset-md-4">

            <?php

            require_once("init.php");





            $resultat = $bdd->query("SELECT * FROM employes");





            // réaliser un selecteur en php avec les noms de topusles employés
            echo '<select class="col-md-2" id="personne" name="personne">';
            while ($employe = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$employe[id_employes]'>$employe[nom]</option>";
            }
            echo '</select>';

            ?>
           
                <input type="submit" class="col-md-2 offset-md-1 btn btn-dark" id="submit" value="supprimer" placeholder="Prénom a insérer">
            

        </div>
    </div>
        </form>


    </div>


    <!-- cdn jquery
    https://code.jquery.com/
    la 3.4.1, minified -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- lien de mon fichier js -->
    <script src="ajax3.js"></script>
</body>

</html>