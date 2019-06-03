<?php
$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$result = $pdo->query("SELECT count(id_conducteur) FROM conducteur ");
$nombre = $result->fetch(PDO::FETCH_ASSOC);
echo'<pre>';print_r($nombre); echo '</pre>';

$result = $pdo->query("SELECT count(id_vehicule) FROM vehicule ");
$nombre = $result->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($nombre);
echo '</pre>';

$result = $pdo->query("SELECT count(id_association) FROM association_vehicule_conducteur ");
$nombre = $result->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($nombre);
echo '</pre>';

// $result = $pdo->query( "SELECT * FROM vehicule AS v, conducteur AS c, association_vehicule_conducteur AS a WHERE ... AND v.id_vehicule = a.id_vehicule AND a.id_conducteur = c.id_conducteur  ");
// $nombre = $result->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($nombre);
// echo '</pre>';

$result = $pdo->query("SELECT * FROM vehicule AS v, conducteur AS c, association_vehicule_conducteur AS a WHERE nom = 'Pandre' AND v.id_vehicule = a.id_vehicule AND a.id_conducteur = c.id_conducteur  ");
$nombre = $result->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($nombre);
echo '</pre>';

echo '<table class="table table-bordered text-center"><tr>';
for ($i = 0; $i < $result->columnCount(); $i++) {
    $colonne = $result->getColumnMeta($i);
    // echo "<pre>";  print_r($colonne);   echo "</pre>";
    echo "<th>$colonne[name]</th>";
    // on crochete a l' indice [name] pour afficher en entete le nom de la colonne par tour de boucle
}

echo '</tr>';
while ($nombre = $result->fetch(PDO::FETCH_ASSOC))
// $employe receptionne un tableau array par employés par tour de boucle
{
    // echo "<pre>";  print_r($employe);   echo "</pre>";
    echo '<tr>';
    foreach ($nombre as $value)
    // la boucle foreach permet de parcourir chaque tableau array de chaque employé
    {
        echo "<td>$value</td>";
    }

    echo '</tr>';
}
echo '</table>';
?>