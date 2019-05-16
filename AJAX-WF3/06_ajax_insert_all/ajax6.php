<?php
require_once('init.php');
extract($_POST);
$tab = array();

if(empty($prenom) || empty($nom) || empty($sexe) || empty($service) || empty( $date_embauche) || empty($salaire)){
    $tab['message'] = '<div class="alert alert-danger text-dark">Vous devez remplir les champs présents</div>';
}else{

    $result = $bdd->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('$prenom', '$nom','$sexe','$service','$date_embauche','$salaire')");
    $tab['message'] = '<div class="alert alert-success text-dark">Félicitations, le formulaire a bien été enregistré</div>';
   

// requete ajax "aller"
$result = $bdd->query("SELECT * FROM employes");

// ***********************declaration du tableau employé, requete ajax "retour"

$tab['resultat'] = '<table class="table table-bordered  mt-4 text-center">
    <tr>';
        for ($i = 0; $i < $result->columnCount(); $i++) {
            $colonne = $result->getColumnMeta($i);
            $tab['resultat'] .= "<th>$colonne[name]</th>";
            }
            $tab['resultat'] .= '</tr>';
           while($employe = $result->fetch(PDO::FETCH_ASSOC)){
               $tab['resultat'] .= '<tr>'; 
               foreach ($employe as $value){
                $tab['resultat'] .= "<td>$value</td>";
                }
              $tab['resultat'] .= '</tr>';
           }
    
        
    $tab['resultat'] .= '</table>';
// $tab['message'] = "<div class='col-md-6 offset-md-3 mt-3 alert alert-success text-center>L' employé <strong>$prenom</strong> a bien été ajouté</div>";
}
echo json_encode($tab);
?>