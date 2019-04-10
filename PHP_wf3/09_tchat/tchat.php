<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Tchat</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <!-- exo : espace de dialogue (tchat)
1 modélisation et création d' une
bdd tchat
Table : commentaire        
        id_commentaire     // INT(3) PK - AI
        pseudo             // VARCHAR(20)
        dateEnregistrement // DateTime
        message            // TEXT
2 connexion a la bdd
3 creation d' un formulaire html ( pourl' ajourt de message)
4 recuperation et affichage des saisies en PHP ($_POST)
5 requete SQL d' enregistrement ( INSERT)
6 affichage des messages
-->

    <div class="container">

        <?php
        // connexion bdd
        $bdd = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        // recup des données en php
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        // Je prépare l'insertion des valeur saisies dans les champs du formulaire
        extract($_POST);
        // permet de transformer chaque indice du formulaire en valeur
        if ($_POST) {
            // $resultat = $bdd->exec("INSERT INTO commentaire (pseudo,dateEnregistrement,message) VALUES ('$pseudo',NOW(),'$message')");
            // // NOW permet l' insertion automatique de l' heure qu' il est
            // echo "nombre d' enregistrement: $resultat<br>";

            $resultat = $bdd->prepare("INSERT INTO commentaire (pseudo, dateEnregistrement, message) VALUES (:pseudo, NOW(), :message)");
            $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $resultat->bindValue(':message', $message, PDO::PARAM_STR);
            $resultat->execute();
            // ces lignes de codes, la methode prepare(), permet d' éviter les injections sql des hackers
            // la ok'); DELETE FROM commentaire;( ne fonctionne plus ( supprimait les commentaires définitivement)
            /* 
                Injection SQL:
                ok'); DELETE FROM commentaire;(

                failles XSS:

                <script type="text/javascript">
                var point =true;
                while(point == true)
                alert("j' ai planté ton site !!")
                </script>

                <style>
                body{
                    display: none;
                }
                </style>
                */
        }

        $resultat = $bdd->query("SELECT pseudo, message, DATE_FORMAT (dateEnregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT (dateEnregistrement, '%H:%i:%S') AS heurefr FROM commentaire ORDER BY dateEnregistrement DESC");

        while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)) {
                // echo '<pre>'; print_r($commentaire); echo '</pre>';
                echo '<div class="col-md-8 offset-md-2 alert alert-secondary">';

                echo "<div><em>Par $commentaire[pseudo], le $commentaire[datefr], à $commentaire[heurefr]</em></div><hr>";
                echo "<div class='text-justify'>$commentaire[message]</div>";

                echo '</div>';
            }

        echo "<div class='text-center'>Nombre de commentaire(s) :<strong class='badge badge-danger'> " . $resultat->rowCount() . '</strong></div>';
        // rowCount est une methode PDOStatement qui retourne le nombre de lignes résultant de la requete SELECT

        ?>

        <h2 class="display-4 text-center">Dialogue Tchat</h2>

        <form class="col-md-4 offset-md-4 text-center" method="post" action="">

            <div class="form-group">
                <label for="pseudo">Votre pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="pseudo">
            </div>

            <div class="form-group">
                <label for="message">Votre message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
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