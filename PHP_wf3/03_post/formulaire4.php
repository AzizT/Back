<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire 4</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1>Formulaire 4</h1>

<?php 
        echo'<pre>'; print_r($_POST); echo '</pre>';
        echo'<div class="col-md-4 offset-md-4 alert alert-success text-center mx-auto>';
        foreach($_POST as $key => $value)
        {
            echo "$key : $value<br>";
        }
        echo '</div>';

        /*
        Exo: si nous n' avonspas de bdd et que nous voudrions récupérer les emails des visiteurs du site, il serait interessant de les enregistrer dans un fichier .txt
        Il existe la focntion fopen() / fwrite() / fclose()
        */

        $fichier =  fopen("liste.txt", "a");
        // pas besoin de créer a l' avance notre fichier txt. Si il n' existe pas  a l'avance, la simple commande du fopen, avec le nom du fichier, permet de créer ce dernier
                    fwrite($fichier, $_POST['pseudo'] . '-' . $_POST['email'] . "\r\n");
                    //  "\r\n" est utilisé pour retourner a la ligne
                    // $_POST[' '] permet de cibler/importer les valeurs que l' on désire exporter dans notre nouveau fichier
                    fclose($fichier);
                    // fermer ce dernier n' est  pas indispencable. Cela permet juste de gagner de la ressource au cas ou
?>

        <form method="post" action="">

        <!-- le pseudo -->
             <div class="form-group">
                 <label for="pseudo">Votre pseudo</label>
                <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo">
            </div>

            <!-- le mail -->
            <div class="form-group">
                <label for="email">Votre adresse mail</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Adresse mail">
                <!-- pour le type, mettre un text au lieu de email, pour pouvoir faire une vérification php sur le navigateur -->
            </div>

            <!-- le bouton submit -->
            <button type="submit" class="btn btn-primary">Sign in</button>

        </form>


<!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
</body>
</html>