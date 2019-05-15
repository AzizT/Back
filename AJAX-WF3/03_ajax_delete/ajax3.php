<?php
require_once('init.php');
extract($_POST);
$tab = array();

// *******************requete de suppression***************************

// $resultat = $bdd->exec("DELETE FROM employes WHERE id_employes = 933");
// echo $resultat;
$resultat = $bdd->exec("DELETE FROM employes WHERE id_employes = '$id'");
// $id est ici équivalent a $_POST['id'] grace au extract($_POST) du dessus

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
// le message de validation, a relier avec l' index.php et l' ajax3.js
$tab['message'] = "<div class='col-md-6 offset-md-3 alert alert-success text-center'>L' employé <strong>$id</strong> a bien été supprimé</div>";

echo json_encode($tab);



?>