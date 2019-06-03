<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Affichage Conducteur</title>
</head>

<body>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $resultat = $pdo->query("SELECT * FROM conducteur");
    echo '<table class="table table-bordered text-center"><tr>';
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