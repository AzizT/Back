<?php
require_once("include/init.php");

if (isset($_GET['action']) && $_GET['action'] == 'validate') {
        $validate .= '<div class="col-md-6 offset-md-3 alert alert-success text-dark">Félicitations, vous etes inscrits sur le site. Vous pouvez dès a présent vous connecter</div>';
    }

require_once("include/header.php");
?>

<h1 class="display-4 text-center">CONNEXION</h1>

<?= $validate ?>

<?php
require_once("include/footer.php");
?>