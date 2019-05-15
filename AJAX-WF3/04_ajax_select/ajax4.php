<?php
require_once('init.php');
extract($_POST);
$tab = array();

// *******************************mon travail************************************************


// $resultat = $bdd->query("SELECT * FROM employes WHERE prenom = 'Aziz'");


// // tableau pour recolter les valeurs
// $tab['resultat'] = '<table class="table table-bordered"><tr>';

//     for ($i = 0; $i < $resultat->columnCount(); $i++) {
//         $colonne = $resultat->getColumnMeta($i);
//     // echo "<pre>";  print_r($colonne);   echo "</pre>";
//     $tab['resultat'] .= "<th>$colonne[name]</th>";
//             // on crochete a l' indice [name] pour afficher en entete le nom de la colonne par tour de boucle
//     }

// $tab['resultat'] .= '</tr>';
//     while ($personne = $resultat->fetch(PDO::FETCH_ASSOC))
//     // $employe receptionne un tableau array par employés par tour de boucle
//     {
//     // echo "<pre>";  print_r($employe);   echo "</pre>";
//     $tab['resultat'] .= '<tr>';

//     foreach ($employe as $value)
//     // la boucle foreach permet de parcourir chaque tableau array de chaque employé
//     {
//         echo "<td>$value</td>";
//     }

//     $tab['resultat'] .= '</tr>';
//     }
// $tab['resultat'] .= '</table>';

// echo json_encode($tab);

// **********************************correction de gregory*********************

// $result = $bdd->query("SELECT * FROM employes WHERE prenom = 'Aziz'");
// echo '<pre>'; var_dump($result); echo'</pre>';
$result = $bdd->query("SELECT * FROM employes WHERE prenom = '$prenom'");
// creation de la variable prenom pour attraper tousles prenoms, et non plus un seul, aziz, comme ci dessus


// ************************declaration du tableau (requete retour ajax)*******************


$tab['resultat'] = '<table class="table table-bordered"><tr>';

for ($i = 0; $i < $result->columnCount(); $i++) {
         $colonne = $result->getColumnMeta($i);
     // echo "<pre>";  print_r($colonne);   echo "</pre>";
     $tab['resultat'] .= "<th>$colonne[name]</th>";
             // on crochete a l' indice [name] pour afficher en entete le nom de la colonne par tour de boucle
    }

$tab['resultat'] .= '</tr><tr>';
$employe = $result-> fetch(PDO::FETCH_ASSOC);
foreach($employe as $value){
    $tab['resultat'] .= "<td>$value</td>";
}
$tab['resultat'] .= '</tr></table>';

echo json_encode($tab);

?>