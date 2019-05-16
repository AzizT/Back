<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>06 Ajax Insert All</title>

    <!-- link Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <h1 class="display-4 text-center">Inserer un employé</h1>

        <div id="resultat">
            <!-- 2 - réaliser le script php permettant d' afficher l' ensemble de la table employes -->


            <?php
            require_once("init.php");

            $resultat = $bdd->query("SELECT * FROM employes"); ?>
            <table class="table table-bordered mt-4">
                <tr>
                    <?php for ($i = 0; $i < $resultat->columnCount(); $i++) :
                        $colonne = $resultat->getColumnMeta($i); ?>
                        <th><?= $colonne['name'] ?></th>
                    <?php endfor; ?>
                </tr>
                <?php while ($employe = $resultat->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <?php foreach ($employe as $value) : ?>
                            <td><?= $value ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
        
        <div id="message">
            <!-- pour accueillir le message de validation -->
        </div>

        <form id="form1" method="post" action="">



            <div id="employes">


                <div class="form-group">
                    <label for="prenom">Votre prenom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prenom">
                </div>

                <div class="form-group">
                    <label for="nom">Votre nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom">
                </div>

                <div class="form-group">
                    <label for="sexe">Sexe</label>
                    <select id="sexe" class="form-control" name=" sexe">
                        <option selected value='f'>Femme</option>
                        <option value='m'>Homme</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="service">Votre service</label>
                    <input type="text" class="form-control" id="service" name="service" placeholder="Votre service">
                </div>

                <div class="form-group">
                    <label for="date_embauche">Votre date d' embauche</label>
                    <input type="date" class="form-control" id="date_embauche" name="date_embauche" placeholder="Votre date d' embauche">
                </div>

                <div class="form-group">
                    <label for="salaire">Votre salaire</label>
                    <input type="text" class="form-control" id="salaire" name="salaire" placeholder="Votre salaire">
                </div>


            </div>

            <input type="submit" class="col-md-2 mb-4 btn btn-dark" id="submit" value="valider" placeholder="ajouter">
        </form>



    </div>


    <!-- cdn jquery
    https://code.jquery.com/
    la 3.4.1, minified -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- lien de mon fichier js -->
    <script src="ajax6.js"></script>
</body>

</html>