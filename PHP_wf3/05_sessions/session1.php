<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SESSION PHP</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <h1 class="displayed-4 text-center">SESSION PHP</h1>


        <?php
        // methode session permet de rester connecter sur un site, même si on change de pages
        //     les données vont etre conservées coté serveur ( et non plus client, comme avec COOKIE)
        // c' est un moyen simple de garder des variables accessibles qlq soit la page ou on se trouve
        //     exemple: sans une session active, nous ne pourrions continuer la navigation sur un site tout en restant connecté -->
        // Vont etre conservés par exemple notre mail, nom, prenom, pseudo etc...

        session_start();
        // permet de créer un fichier session se trouvant dans le dossier C:\xampp\tmp

        $_SESSION['pseudo'] ="Tobb";
        $_SESSION['nom'] ="TOBBAL";
        $_SESSION['prenom'] ="Aziz";

        echo'<pre>'; print_r($_SESSION); echo'</pre>';

        // vider une partie de la session
        unset($_SESSION['prenom']);
        echo'<pre>'; print_r($_SESSION); echo'</pre>';
        // ici, supprimer la valeur du prenom

        // session_destroy();
        // permet de supprimer l' integralité de la session
        // le fichier session et celui du cookie sont liés...le cookie servant d' identifiant pourla session

        ?>

    </div>

    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>