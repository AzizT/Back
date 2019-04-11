<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TP Formulaire</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<?php
    echo '<pre>'; print_r($_POST); echo '</pre>';
 ?>

         <div class="container text-center">


         <h2 class="display-4 text-center">Formulaire 1</h1>

         

             <form class="col-md-4 offset-md-4" method="post" action="">
             
             <!-- le nom -->
            <div class="form-group">
                <label for="text">Votre nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Votre nom">
            </div>

            <!-- le prenom -->
            <div class="form-group">
                <label for="text">Votre prénom</label>
                <input type="text" class="form-control" name="prenom" placeholder="Votre prenom">
            </div>

            <!-- l' adresse -->
            <div class="form-group">
                <input type="text" class="form-control" name="adresse" id="inputAddress" placeholder="Votre adresse...">
            </div>

            <!-- la ville -->
            <div class="form-group">
                <input type="text" class="form-control" id="inputCity" name="ville" placeholder="Votre ville...">
            </div>

            <!-- le code-postal -->
            <div class="form-group">
                <label for="codePostal">Code postal</label>
                <input type="text" class="form-control" id="codePostal" name="codePostal">
            </div>

            <!-- le sexe -->
            <div class="form-group">
                <label for="inputSexe">Sexe</label>
                <select id="inputSexe" class="form-control" name=" sexe">
                    <option value="f" selected>Femme</option>
                    <option value="m">Homme</option>
                </select>
            </div>

            <!-- le bouton submit -->
            <button type="submit" class="btn btn-primary">Sign in</button>
  
            </form>

            <hr><h2 class="display-4 text-center">Formulaire Voiture</h1>

            <?php
            echo '<pre>'; print_r($_POST); echo '</pre>';
                echo'<div class="col-md-4 offset-md-4 alert alert-success text-center mx-auto>';
                foreach($_POST as $key => $value)
                {
                    echo "$key : $value<br>";
                }
                echo '</div>';
            ?>

            <form class="col-md-4 offset-md-4" method="post" action="">
             
             <!-- la marque -->
            <div class="form-group">
                <label for="marque">Marque du véhicule</label>
                <input type="text" class="form-control" id="marque" name="marque" placeholder="marque">
            </div>

            <!-- le modèle -->
            <div class="form-group">
                <label for="modele">Modèle du véhicule</label>
                <input type="text" class="form-control" id="modele" name="modele" placeholder="modele">
            </div>

            <!-- la couleur -->
            <div class="form-group">
            <label for="couleur">Couleur du véhicule</label>
                <input type="text" class="form-control" id="couleur" name="couleur" placeholder="couleur">
            </div>

            <!-- le kilometrage -->
            <div class="form-group">
            <label for="kilometrage">Kilometrage du véhicule</label>
                <input type="text" class="form-control" id="kilometrage" name="kilometrage" placeholder="kilometrage">
            </div>

            <!-- le carburant -->
            <div class="form-group">
                <label for="carburant">Type de carburant</label>
                <input type="text" class="form-control" id="carburant" name="carburant" placeholder="carburant">
            </div>

             <!-- l' année -->
             <div class="form-group">
                <label for="annee">Année du véhicule</label>
                <input type="text" class="form-control" id="annee" name="annee" placeholder="annee">
            </div>

            <!-- le prix -->
            <div class="form-group">
                <label for="prix">Prix du véhicule</label>
                <input type="text" class="form-control" id="prix" name="prix" placeholder="prix">
            </div>

            <!-- la puissance -->
            <div class="form-group">
            <label for="puissance">Puissance du véhicule</label>
                <input type="text" class="form-control" id="puissance" name="puissance" placeholder="Puissance...">
            </div>

            <!-- les options -->
            <div class="form-group">
            <label for="option">Option choisie</label>
                <input type="text" class="form-control" id="option" name="option" placeholder="Option choisie...">
            </div>


            

            <!-- le bouton submit -->
            <button type="submit" class="btn btn-primary">Sign in</button>
  
            </form>

         </div>


    

<!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>