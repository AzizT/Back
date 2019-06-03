<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Affichage Association</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index_conducteur.php">Conducteur</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="index_vehicule.php">Vehicule</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index_association.php">Association</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
    </nav>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $resultat = $pdo->query("SELECT * FROM association_vehicule_conducteur");
    echo '<table class="table table-bordered text-center mt-4"><tr>';
    for ($i = 0; $i < $resultat->columnCount(); $i++) {
        $colonne = $resultat->getColumnMeta($i);
        // echo "<pre>";  print_r($colonne);   echo "</pre>";
        echo "<th>$colonne[name]</th>";
        // on crochete a l' indice [name] pour afficher en entete le nom de la colonne par tour de boucle
    }

    echo '</tr>';
    while ($conducteur = $resultat->fetch(PDO::FETCH_ASSOC))
    // $employe receptionne un tableau array par employés par tour de boucle
    {
        // echo "<pre>";  print_r($employe);   echo "</pre>";
        echo '<tr>';
        foreach ($conducteur as $value)
        // la boucle foreach permet de parcourir chaque tableau array de chaque employé
        {
            echo "<td>$value</td>";
        }

        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>

</html>