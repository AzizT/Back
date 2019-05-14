<?php
require_once('init.php');
extract($_POST);

$tab = array();

// $result = $bdd->query("INSERT INTO employes (prenom) VALUES ('Aziz')");
// requete test ci dessus, elle fonctionne, et désormais on enleve le prenom a inserer pour mettre une variable pourune insertion via formulaire

if(!empty($personne)){
$result = $bdd->query("INSERT INTO employes (prenom) VALUES ('$personne')");
$tab['resultat'] = "<div class='col-md-6 offset-md-3 alert alert-success text-center'>L' employé <strong>$personne</strong> a bien été enregistré</div>";
}
else{
    $tab['resultat']="<div class='col-md-6 offset-md-3 alert alert-danger text-center'>Merci de saisir un prénom</div>";
}
echo json_encode($tab);
// pour pouvoir véhiculer des données en http via une requete AJAX, nous devons encoder en JSON, c' est un format léger. C' est la réponse de la requete "retour" AJAX que l' on retrouve dans function(data) dans le fichier ajax2.js
?>