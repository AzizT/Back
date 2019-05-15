<?php
require_once('init.php');
extract($_POST);
$tab = array();

$result = $bdd->query("SELECT * FROM employes WHERE id_employes = '$id'");
// creation de la variable prenom pour attraper tousles prenoms, et non plus un seul, aziz, comme ci dessus


// ************************declaration du tableau (requete retour ajax)*******************


// $tab['resultat'] = '<table class="table table-bordered"><tr>';

// for ($i = 0; $i < $result->columnCount(); $i++) {
//     $colonne = $result->getColumnMeta($i);
//     // echo "<pre>";  print_r($colonne);   echo "</pre>";
//     $tab['resultat'] .= "<th>$colonne[name]</th>";
//     // on crochete a l' indice [name] pour afficher en entete le nom de la colonne par tour de boucle
// }

// $tab['resultat'] .= '</tr><tr>';
// $employe = $result->fetch(PDO::FETCH_ASSOC);
// foreach ($employe as $value) {
//     $tab['resultat'] .= "<td>$value</td>";
// }
// $tab['resultat'] .= '</tr></table>';

// echo json_encode($tab);

?>