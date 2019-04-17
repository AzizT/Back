<?php
require_once("include/init.php");
require_once("include/header.php");

// realiser la requete permettant de selectionner le produit par rapport a l' id_produit envoyé dans l' URL
// associer une méthode pour rendre le resultat exploitable
// créer une fiche produit avec les informations du produit: photo, categorie, titre, description, couleur, taille, prix, public et un bouton d' ajout au panier

if(isset($_GET['id_produit'])):

$resultat = $bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
$resultat->bindValue(':id_produit', $_GET['id_produit'], PDO::PARAM_STR);
$resultat->execute();

$produits = $resultat->fetch(PDO::FETCH_ASSOC);

?>

<h1 class="display-4 text-center mt-4">Détail du produit</h1>

<div class="col-lg-8 mx-auto mt-4 mb-4 fiche_individuelle">
    <div class="card h-100">
        <a href="#"><img class="card-img-top" src="<?= $produits['photo'] ?>" alt="<?= $produits['description'] ?>"></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="#"><?= $produits['titre'] ?></a>
            </h4>
            <h5><?= $produits['prix'] ?> €</h5>
            <p class="card-text"><?= $produits['description'] ?></p>
        </div>
        <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
    </div>
</div>
<?php
 else:
     header('Location: boutique.php');

 endif;
?>
<?php
require_once("include/footer.php");
?>