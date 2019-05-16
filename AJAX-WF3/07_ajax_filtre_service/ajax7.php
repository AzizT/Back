<?php
require_once('init.php');
extract($_POST);
$tab = array();

// requete ajax "aller"
$result = $bdd->query("SELECT * FROM employes WHERE service = '$service'");

// ***********************declaration du tableau employé, requete ajax "retour"

$tab['resultat'] = '<table class="table table-bordered  mt-4 text-center"><tr>';
for ($i = 0; $i < $result->columnCount(); $i++) {
    $colonne = $result->getColumnMeta($i);
    $tab['resultat'] .= "<th>$colonne[name]</th>";
    }
    $tab['resultat'] .= '</tr>';
    while($employe = $result->fetch(PDO::FETCH_ASSOC)){
        $tab['resultat'] .= '<tr>';
        foreach ($employe as $value){
        
        $tab['resultat'] .= "<td>$value</td>";
        
    }$tab['resultat'] .= '</tr>';

    
    }

    $tab['resultat'] .= '</tr>';
    $tab['resultat'] .= '</table>';
    
    echo json_encode($tab);
