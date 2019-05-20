<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

$resultat = $bdd->query("SELECT * FROM annuaire");

echo '<table class="table table-bordered text-center"><tr>';
for ($i = 0; $i < $resultat->columnCount(); $i++) {
    $colonne = $resultat->getColumnMeta($i);
    // echo "<pre>";  print_r($colonne);   echo "</pre>";
    echo "<th>$colonne[name]</th>";
    // on crochete a l' indice [name] pour afficher en entete le nom de la colonne par tour de boucle
}

echo '</tr>';
while ($employe = $resultat->fetch(PDO::FETCH_ASSOC))
// $employe receptionne un tableau array par employés par tour de boucle
{
    // echo "<pre>";  print_r($employe);   echo "</pre>";
    echo '<tr>';
    foreach ($employe as $value)
    // la boucle foreach permet de parcourir chaque tableau array de chaque employé
    {
        echo "<td>$value</td>";
    }

    echo '</tr>';
}
echo '</table>';
?>