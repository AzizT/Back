<?php
require_once("include/init.php");

if(!internauteEstConnecte())
// si l' internaute n' est pas connecté, il ne peut acceder a la page profil, et est redirigé vers connexion.php
{
    header("Location: connexion.php");
}

require_once("include/header.php");

// echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>

<!-- exo: afficher le pseudo de l' internaute en passant par son fichier session -->

<h1 class="display-4 text-center">Bonjour, <?= $_SESSION['membre']['pseudo'] ?></h1>
<hr>

<!-- realiser page profil avec toutes les données affichées dans le array, sauf id_membre et statut -->

<table class="col-md-6 mx-auto table table-dark">
    <?php foreach($_SESSION['membre'] as $key => $value): ?>
    <tr>

    <?php if($key != 'id_membre' && $key != 'statut'): ?>

    <th><?= $key ?></th><td><?= $value ?></td>
    
<?php endif; ?>
    </tr>
<?php endforeach; ?>

<!-- les ':', endif et endforeach remplacent les accolades -->

</table>

<?php
if($_SESSION['membre']['statut'] == 1)
    $statut = 'ADMIN';
else
    $statut = 'MEMBRE';
// pas besoin d' accolades pour ce if else car une seule condition dans le if
?>

<h3 class="text-center">Vous etes <strong class="text-info"><?= $statut ?></strong> du site !</h3>


<?php
require_once("include/footer.php");
?>