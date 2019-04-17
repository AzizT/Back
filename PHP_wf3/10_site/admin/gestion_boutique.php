<?php

require_once("../include/init.php");

extract($_POST);

extract($_GET);





// si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page connexion.php

if (!internauteEstConnecteEstAdmin()) {

        header("Location:" . URL . "connexion.php");
    }

// ---------------SUPPRESSION DE PRODUIT-----------------------

if (isset($_GET['action']) && $_GET['action'] == 'suppression') {

        $produit_delete = $bdd->prepare("DELETE FROM produit WHERE id_produit = :id_produit");

        $produit_delete->bindValue(':id_produit', $id_produit, PDO::PARAM_STR);

        // Exo: requete de suppression produit

        // echo 'suppression produit';

        $produit_delete->execute();

        $_GET['action'] = 'affichage'; // on redirige vers l'affichage des produits

        $validate .= "<div class='alert-success col-md-6 offset-md-3 text-center'>le produit n° <strong>$id_produit</strong>a bien été supprimé !! </div>";
    }





//-----------ENREGISTREMENT PRODUIT-------------------------



if ($_POST) {

        $photo_bdd = '';

        if (isset($_GET['action']) && $_GET['action'] == 'modification') {

                $photo_bdd = $photo_actuelle; // si on souhaite conserver la même photo en cas de modification, on affecte la valeur du champs photo 'hidden', c'est à dire l'URLde la photo selectionnée en BDD

            }

        if (!empty($_FILES['photo']['name'])) // on vérifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploader une photo

            {

                $nom_photo = $reference . '-' . $_FILES['photo']['name']; // on redéfinit le nom de la photo en concaténant la référence saisi dans le formulaire avec le nom de la photo

                echo $nom_photo . '<br>';



                $photo_bdd = URL . "photo/$nom_photo"; // on définit l'URL de la photo, c'est ce que l'on conservera en BDD

                echo $photo_bdd . '<br>';



                $photo_dossier = RACINE_SITE . "photo/$nom_photo"; // on définit le chemin physique de la photo sur le disque dur du serveur, c'est ce qui nous permettra de copier la photo dans le dossier photo

                echo $photo_dossier . '<br>';



                copy($_FILES['photo']['tmp_name'], $photo_dossier); // copy() est une fonction prédéfinie qui permet de copier la photo dans le dossier photo. arguments: copy(nom_temporaire_photo, chemin de destination)





            }

        // Exo : Réaliser la requete d'insertion permettant d'inserer un produit dans la table 'produit' (requête préparée) + a l' interieur (else) la requete d' update ( modification de produit).



        if(isset($_GET['action']) && $_GET['action'] == 'ajout')
            {
        $produit_insert = $bdd->prepare("INSERT into produit(reference, categorie ,titre, description, couleur, taille, public, photo, prix, stock) VALUES(:reference, :categorie , :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");

                $_GET['action'] = 'affichage';

                $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n° <strong>$reference</strong> a bien été ajouté !!</div>";

            }else{
                $produit_insert = $bdd->prepare("UPDATE produit SET reference = :reference, categorie = :categorie, titre = :titre, description = :description, couleur = :couleur, taille = :taille, public = :public, photo = :photo, prix = :prix, stock = :stock WHERE id_produit = $id_produit");

                $_GET['action'] = 'affichage';

                $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n° <strong>$id_produit</strong> a bien été modifié !!</div>";
            }
        foreach ($_POST as $key => $value) {

                if ($key != 'photo_actuelle') {

                        $produit_insert->bindValue(":$key", $value, PDO::PARAM_STR);
                    }
            }

        $produit_insert->bindValue(":photo", $photo_bdd, PDO::PARAM_STR);

        $produit_insert->execute();
    }

require_once("../include/header.php");



// echo '<pre>'; print_r($_POST); echo'</pre>';

// echo '<pre>'; print_r($_FILES); echo'</pre>';

// $_FILES: superglobale permet de véhiculer les informations d'un fichier uploader

?>



<!-- LIEN PRODUITS -->

<ul class="col-md-4 offset-md-4 list-group mt-4 text-center">

    <li class="list-group-item bg-dark text-center text-white">BACK OFFICE</li>

    <li class="list-group-item"><a href="?action=affichage" class="alert-link text-dark">AFFICHAGE PRODUIT</a></li>

    <li class="list-group-item"><a href="?action=ajout" class="alert-link text-dark">AJOUT PRODUIT</a></li>



</ul>

<!-- FIN LIENS PRODUITS -->



<!-- AFFICHAGE PRODUIT -->

<!-- 

  Exo: réaliser le traitement permettant l'affichage des produits sous forme de tableau HTML

 -->



<?php if (isset($_GET['action']) && $_GET['action'] == 'affichage') : ?>

    <h1 class="display-4 text-center"> Liste des produits</h1>

    <?= $validate ?>

    <?php $resultat = $bdd->query("SELECT * FROM produit"); ?>

    <?php $produits = $resultat->fetchAll(PDO::FETCH_ASSOC); ?>

    <!-- <?php echo '<pre>';
            print_r($produits);
            echo '</pre>'; ?> -->





    <table class="table table-bordered text-center">
        <tr>

            <?php foreach ($produits[0] as $key => $value) : ?>

                <th> <?= strtoupper($key) ?></th>

            <?php endforeach; ?>

            <th>MODIFIER</th>

            <th>SUPPRIMER</th>

        </tr>

        <?php foreach ($produits as $key => $tab) : ?>

            <tr>

                <?php foreach ($tab as $key2 => $value) : ?>

                    <?php if ($key2 != 'photo') : ?>

                        <td><?= $value ?></td>

                    <?php else : ?>

                        <td><img src="<?= $value ?>" alt="<?= $tab['titre'] ?>" class="card-img-top"></td>

                    <?php endif; ?>

                <?php endforeach; ?>

                <td><a href="?action=modification&id_produit=<?= $tab['id_produit'] ?>" class="text-dark"><i class="fas fa-edit"></i></a></td>

                <td><a href="?action=suppression&id_produit=<?= $tab['id_produit'] ?>" class="text-danger" onclick="return(confirm('En êtes vous certai?'))"><i class="fas fa-trash-alt"></i></a></td>



            </tr>

        <?php endforeach; ?>

    </table>



<?php endif; ?>



<!-- FIN AFFICHAGE PRODUITS -->

<?php if (isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')) : ?>



    <h1 class="col-md-6 offset-md-4 text-center"> <?= $action ?> d'un produit</h1>

    <?php

    if (isset($_GET['id_produit'])) {

            $resultat = $bdd->prepare("SELECT * FROM produit WHERE  id_produit = :id_produit");

            $resultat->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);

            $resultat->execute();

            $produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC);

            echo '<pre>';
            print_r($produit_actuel);
            echo '</pre>';
        }

    $reference = (isset($produit_actuel['reference'])) ? $produit_actuel['reference'] : '';

    $categorie = (isset($produit_actuel['categorie'])) ? $produit_actuel['categorie'] : '';

    $titre = (isset($produit_actuel['titre'])) ? $produit_actuel['titre'] : '';

    $description = (isset($produit_actuel['description'])) ? $produit_actuel['description'] : '';

    $couleur = (isset($produit_actuel['couleur'])) ? $produit_actuel['couleur'] : '';

    $public = (isset($produit_actuel['public'])) ? $produit_actuel['public'] : '';

    $prix = (isset($produit_actuel['prix'])) ? $produit_actuel['prix'] : '';

    $photo = (isset($produit_actuel['photo'])) ? $produit_actuel['photo'] : '';

    $taille = (isset($produit_actuel['taille'])) ? $produit_actuel['taille'] : '';

    $stock = (isset($produit_actuel['stock'])) ? $produit_actuel['stock'] : '';



    ?>

    <!-- 

        1.Réaliser un formulaire permettant d'inserer un produit dans la table 'produit(sauf le champs: id_produit'

     -->



    <form class="col-md-6 offset-md-4 formulaire" method="post" action="" enctype="multipart/form-data">

        <!-- enctype: obligatoire en PHP pour recolter les informations d'1 fichier uploadé -->



        <div class="form-group">

            <label for="reference">Référence</label>

            <input type="text" class="form-control" id="reference" placeholder="Enter reference" name="reference" value="<?= $reference ?>">



        </div>

        <div class="form-group">

            <label for="categorie">Catégorie</label>

            <input type="text" class="form-control" id="categorie" aria-describedby="" placeholder="Enter categorie" name="categorie" value="<?= $categorie ?>">

        </div>

        <div class="row">

            <div class="form-group col-md-6">

                <label for="titre">Titre</label>

                <input type="text" class="form-control" id="titre" aria-describedby="" placeholder="Enter titre" name="titre" value="<?= $titre ?>">



            </div>

            <div class="form-group col-md-6">

                <label for="description">Description</label>

                <input type="text" class="form-control" id="description" aria-describedby="" placeholder="enter description" name="description" value="<?= $description ?>">

            </div>

        </div>



        <div class="row">

            <div class="form-group col-md-6">

                <label for="couleur">Couleur</label>

                <input type="text" class="form-control" id="couleur" aria-describedby="" placeholder="couleur" name="couleur" value="<?= $couleur ?>">

            </div>





            <div class="form-group col-md-6">

                <label for="taille">Taille</label>

                <select class="form-control" id="taille" name="taille" value="">

                    <option>choose</option>

                    <option value="s" <?php if ($taille == 's') echo 'selected'; ?>>S</option>

                    <option value="m" <?php if ($taille == 'm') echo 'selected'; ?>>M</option>

                    <option value="l" <?php if ($taille == 'l') echo 'selected'; ?>>L</option>

                    <option value="xl" <?php if ($taille == 'xl') echo 'selected'; ?>>XL</option>



                </select>

            </div>

        </div>

        <div class="form-group">

            <label for="public">Public</label>

            <select class="form-control" id="public" name="public" value="">

                <option value="mixte" <?php if ($public == 'mixte') echo 'selected'; ?>>Mixte</option>

                <option value="f" <?php if ($public == 'f') echo 'selected'; ?>>Feminin</option>

                <option value="m" <?php if ($public == 'm') echo 'selected'; ?>>Masculin</option>

            </select>

        </div>



        <div class="row">

            <div class="form-group col-md-6">

                <label for="photo">Photo</label>

                <input type="file" class="form-control" id="photo" aria-describedby="" placeholder="" name="photo">

            </div>

            <?php if (!empty($photo)) : ?>

                <em>Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</em><br>

                <img src="<?= $photo ?>" alt="<? $titre ?>" class="card-img-top">

            <?php endif; ?>

            <input type="hidden" id="photo_actuelle" name="photo_actuelle" value="<?= $photo ?>">



            <div class="form-group col-md-6">

                <label for="prix">Prix</label>

                <input type="text" class="form-control" id="prix" aria-describedby="" placeholder="Enter prix" name="prix" value="<?= $prix ?>">

            </div>

        </div>

        <div class="form-group">

            <label for="stock">Stock</label>

            <input type="text" class="form-control" id="stock" aria-describedby="" placeholder="Enter stock" name="stock" value="<?= $stock ?>">

        </div>

        <button type="submit" class="btn btn-danger col-md-4 offset-md-4"><?= $action ?></button>

    </form <?php endif; ?> <?php

                        require_once("../include/footer.php");

                        ?>