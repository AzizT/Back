<?php
require_once 'correction_alpha_exo_gregory.php';
// on appelle le fichier pour faire appel a la class Etudiant

// instanciation de la class Etudiant
$etudiant = new Etudiant;
$etudiant->setPrenom('Aziz');
$etudiant->setNom('Tobbal');
$etudiant->setEmail('azziz.tobbal@lepoles.com');
$etudiant->setTelephone('0123654789');

// désormais, on n' appelle plus les guetteurs
$e = $etudiant->getInfos();

$etudiant1 = new Etudiant;
$etudiant1->setPrenom('Nabila');
$etudiant1->setNom('Tobbal');
$etudiant1->setEmail('nabila.tobbal@lepoles.com');
$etudiant1->setTelephone('0123654789');

$e1 = $etudiant1->getInfos();

$etudiant2 = new Etudiant;
$etudiant2->setPrenom('Yannis');
$etudiant2->setNom('Tobbal');
$etudiant2->setEmail('yannis.tobbal@lepoles.com');
$etudiant2->setTelephone('0123654789');

$e2 = $etudiant2->getInfos();

?>
<h2>Etudiant : <?= $e['nom'] . ' ' . $e['prenom'] ?></h2>
Prénom : <?= $e['prenom'] ?><br>
Nom : <?= $e['nom'] ?><br>
Email : <?= $e['email'] ?><br>
Telephone : <?= $e['telephone'] ?><br>

<h2>Etudiant : <?= $e1['nom'] . ' ' . $e1['prenom'] ?></h2>
Prénom : <?= $e1['prenom'] ?><br>
Nom : <?= $e1['nom'] ?><br>
Email : <?= $e1['email'] ?><br>
Telephone : <?= $e1['telephone'] ?><br>

<h2>Etudiant : <?= $e2['nom'] . ' ' . $e2['prenom'] ?></h2>
Prénom : <?= $e2['prenom'] ?><br>
Nom : <?= $e2['nom'] ?><br>
Email : <?= $e2['email'] ?><br>
Telephone : <?= $e2['telephone'] ?><br>