<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lien Fruits</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- 
        exo: effectuer 4 liens html pointant sur la même page avec le nom des fruits.
             Faire en sorte d' envoyer cerises dans l' URL si on clic sur le lien 'cerises'( et faire la même chose avec tous les autres liens)
             Afficher 'cerise' sur la page web si on a cliqué dessus ( si cerise est passé dans l' URL, par conséquent, même chose avec les autres fruits)
             Envoyer l' infirmation a  la fonction calcul() afin d' afficher le prix pour 1gk ( pareil  pour tous les fruits)
     -->

    

    <div class="container text-center">

        <h1 class="displayed-4 text-center">Liens fruits</h1>

        <h4>Votre choix : <strong class="text-info"><?= (isset($_GET['type'])) ? $_GET['type'] : "aucun fruit selectionné !"; ?></strong></h4>
        <!--"?=" => remplace echo
            "?"  => remplace le if
            ":"  => remplace le else 
            cette condition ternaire est faite pour le cas de figure ou il n y a pas de fruit selectionné
            a mettre en relation avec la balise php et le if(isset) a l' intérieur -->
        <?php
        require_once('focntion.php');

        if(isset($_GET['type']))
        {
          echo calcul($_GET['type'], 1000);  
        }
        

        ?>

        <ul class="col-md-2 offset-md-5 list-group">
            <a href="lien_fruit.php?id=1&type=cerises&couleur=rouge&prix=5.76">
                <li class="list-group-item">Cerises</li>
            </a>
            <a href="lien_fruit.php?id=2&type=bananes&couleur=jaune&prix=1.06">
                <li class="list-group-item">Bananes</li>
            </a>
            <a href="lien_fruit.php?id=3&type=pommes&couleur=verte&prix=1.61">
                <li class="list-group-item">Pommes</li>
            </a>
            <a href="lien_fruit.php?id=4&type=peches&couleur=peche&prix=3.23">
                <li class="list-group-item">Peches</li>
            </a>
        </ul>

    </div>

    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>