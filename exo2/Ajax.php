<?php

require_once('connexion.php');

extract($_POST);

$tab = array();



$result = $pdo->query("SELECT * FROM produit");

$tab['resultat'] = '<table class="table table-bordered text-center"><tr>';



for ($i = 0; $i < $result->columnCount(); $i++) {

    $colonne = $result->getColumnMeta($i);

    $tab['resultat'] .= "<th>$colonne[name]</th>";
}

$tab['resultat'] .= '</tr>';

while ($produit = $result->fetch(PDO::FETCH_ASSOC)) {

    $tab['resultat'] .= '<tr>';

    foreach ($produit as $value) {

        $tab['resultat'] .= "<td>$value</td>";
    }

    $tab['resultat'] .= '</tr>';
}

$tab['resultat'] .= '</table>';



echo json_encode($tab);
