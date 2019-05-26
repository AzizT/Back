<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau Produit</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    


<?php

$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$resultat = $pdo->query("SELECT * FROM produit");
        echo '<table class="table table-bordered text-center"><tr>';
        for ($i = 0; $i < $resultat->columnCount(); $i++) {
            $colonne = $resultat->getColumnMeta($i);
            // echo "<pre>";  print_r($colonne);   echo "</pre>";
            echo "<th>$colonne[name]</th>";
            // on crochete a l' indice [name] pour afficher en entete le nom de la colonne par tour de boucle
        }

        echo '</tr>';
        while ($produit = $resultat->fetch(PDO::FETCH_ASSOC))
            // $employe receptionne un tableau array par employés par tour de boucle
            {
                // echo "<pre>";  print_r($employe);   echo "</pre>";
                echo '<tr>';
                foreach ($produit as $value)
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