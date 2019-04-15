<?php
require_once("../include/init.php");
extract($_POST);

if (!internauteEstConnecteEstAdmin())
    // si l' utilisateur n' est pas admin, on lui refuse l' acces en le dirigeant vers connexion( via changement URL, car de toutes les manières, l' onglet de gestion est invisible pour les non connectés comme pour les membres). Ci dessous, c' est changement manuel URL
    {
        header("Location:" . URL . "connexion.php");
    }

// ************enregistrement produit************************

if ($_POST) {
    $photo_bdd = '';
    if (!empty($_FILES['photo']['name'])) {
        $nom_photo = $reference . $_FILES['photo']['name'];
        echo $nom_photo . '<br>';

        $photo_bdd = URL . "photo/$nom_photo";
        echo $photo_bdd . '<br>';

        $photo_dossier = RACINE_SITE . "photo/$nom_photo";
        echo $photo_dossier . '<br>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }
}

require_once("../include/header.php");
echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<pre>';
print_r($_FILES);
echo '</pre>';
// $_FILES: superglobale qui permet de véhiculer les informations d' un fichier uploadé
?>

<!-- réaliser un formulaire permettant d' insérer un produit dans la table 'produit' (sauf le champ id_produit) -->

<form method="post" action="" class="col-md-6 offset-md-3 formulaire" enctype="multipart/form-data">
    <!-- entype est obligatoire en php pour récolter en php les informations d' un fichier uploadé -->


    <div class="form-group">
        <label for="reference">Référence</label>
        <input type="text" class="form-control" id="reference" name="reference" placeholder="">
    </div>


    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <input type="text" class="form-control" id="categorie" name="categorie" placeholder="">
    </div>


    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" placeholder="">
    </div>


    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="">
    </div>


    <div class="form-group">
        <label for="couleur">Couleur</label>
        <input type="text" class="form-control" id="couleur" name="couleur" placeholder="">
    </div>


    <div class="form-group">
        <label for="taille">Taille</label>
        <input type="text" class="form-control" id="taille" name="taille" placeholder="">
    </div>


    <div class="form-group">
        <label for="public">Public</label>
        <select class="form-control" id="public" name="public" placeholder="">
            <option value="mixte">Mixte</option>
            <option value="f">Femme</option>
            <option value="h">Homme</option>
        </select>
    </div>


    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" placeholder="">
    </div>


    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix" placeholder="">
    </div>


    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="text" class="form-control" id="stock" name="stock" placeholder="">
    </div>

    <!-- le bouton submit -->
    <button type="submit" class="btn btn-primary">Ajouter</button>

</form>

<?php
require_once("../include/footer.php");
?>