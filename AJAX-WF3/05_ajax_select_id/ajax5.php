<?php
require_once('init.php');
extract($_POST);
$tab = array();

// requete ajax "aller"
$result = $bdd->query("SELECT * FROM employes WHERE id_employes = $id");

// ***********************declaration du tableau employé, requete ajax "retour"

$tab['resultat'] = '<table class="table-bordered  mt-4 text-center"><tr>';
for ($i = 0; $i < $result->columnCount(); $i++) {
    $colonne = $result->getColumnMeta($i);
    $tab['resultat'] .= "<th>$colonne[name]</th>";
    }
    $tab['resultat'] .= '</tr><tr>';
    $employe = $result->fetch(PDO::FETCH_ASSOC);

    foreach ($employe as $value){
        $tab['resultat'] .= "<td>$value</td>";
    }

    $tab['resultat'] .= '</tr>';
    $tab['resultat'] .= '</table>';
    
    echo json_encode($tab);
    ?>
   