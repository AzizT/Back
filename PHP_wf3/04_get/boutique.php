<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil boutique</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- autant la méthode POST permettait de récupérer les données d' un fomulaire, ici, GET va nous permettre de récupérer des données URL -->

    <div class="container text-center">

        <h1 class="displayed-4 text-center">Bienvenue dans notre boutique !</h1>
        <hr>

        <div class="col-md-4 offset-md-4 border border-primary">

            <img src="https://www.tati.fr/phototheque/boutique/172750/prodfp/00W126756A.jpg" alt="tshirt paris"> </a><br>

            <a href="fiche_produit.php?id=1&type=tshirt&couleur=rouge&prix=15">Voir le détail du produit 1</a><br>

        </div>
        <!-- le ? permet de séparer l' URL des argumentys a venir => argument = indice + valeur, tous séparés par un & -->
        <a href="fiche_produit.php?id=2&type=chaussures&couleur=beige&prix=69" target="_blank">Voir le détail de notre produit 2</a><br>
        <a href="fiche_produit.php?id=3&type=pantalon&couleur=marron&prix=30" target="_blank">Voir le détail de notre produit 3</a><br>
        <a href="fiche_produit.php?id=4&type=sweat&couleur=vert&prix=50" target="_blank">Voir le détail de notre produit 4</a><br>
        <a href="fiche_produit.php?id=5&type=chaussettes&couleur=noir&prix=8" target="_blank">Voir le détail de notre produit 5</a><br>

    </div>


    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>