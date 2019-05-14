<?php
require_once('init.php');
extract($_POST);

// *******************requete de suppression***************************

// $resultat = $bdd->exec("DELETE FROM employes WHERE id_employes = 933");
// echo $resultat;
$resultat = $bdd->exec("DELETE FROM employes WHERE id_employes = '$id'");

// declaration du selecteur a <jour></jour>
$resultat = $bdd->query("SELECT * FROM employes");
$tab['resultat'] = '<div class="form-group">';
$tab['resultat'] .= '<select class="form-control" id="personne" name="personne">';
while($employe=$resultat->fetch(PDO::FETCH_ASSOC))
{
    $tab['resultat'] .= "<option value='$employe[id_employes]'>$employe[nom]</option>";
}
$tab['resultat'] .= '</select>';
$tab['resultat'] .='</div>';

echo json_encode($tab);
?>