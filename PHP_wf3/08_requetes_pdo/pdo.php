<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Requete PDO</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <h2 class="display-4 text-center">01. PDO : connexion</h2>

        <?php

        // class PDO
        // va nous permettre de nous connecter a la bdd
        // {
        //     methodes (fonctions)
        //     proprietes (variables)
        // }
        // différentes requetes pdo https://www.php.net/manual/fr/book.pdo.php


        // connexion bdd
        $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // on crée un objet dela Class pdo, et c' est lui qui va etre connecté a la bdd. C' est lui qui va interréagir et interroger cette derniere
        // PDO est une class prédéfinie en php. Elle possede ses propres méthodes (fonctions) qui nous permettrons de formuler une requete sql.
        // arguments: 1 - (serveur + bdd)
        //    2 - (identifiant)
        //    3 - (mdp)
        //    4 - (options PDO)

        echo '<pre>';
        var_dump($pdo);
        echo '</pre>';
        echo '<pre>';
        print_r(get_class_methods($pdo));
        echo '</pre>';

        echo '<hr><h2 class="display-4 text-center">02. PDO : EXEC - INSERT / UPDATE / DELETE </h2><hr>';

        if (isset($true)) {
            // cette condition est mise pour ne permettre qu' un seul insert, sinon, a chaque rechargement de page, l' insert se répétera "betement".
            $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('Aziz', 'Tobbal', 'm', 'direction', '1995-12-09', 75000)");
            echo "nombre d' enregistrement affecté(s) par l' INSERT : $resultat <br>";
            echo "dernier ID généré : " . $pdo->lastInsertId() . '<hr>';
            // lastInsertId va nous permettre d' afficher le dernier ID généré

            /*
            EXEC() est une méthode issue del a classe prédéfinie PDO. Elle permet de formuler et executer des requetes SQL. Tous les arguments vont etre mis entre parentheses, la requete entière y sera => ("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('Aziz', 'Tobbal', 'm', 'direction', '1995-12-09', 75000)")
            EXEC() est prévu pour des requetes ne retournant pas de jeu de résultats (INSERT / UPDATE / DELETE)
        */

            // UPDATE: exo; réaliser le traitement permettant de modifier le salaire de l' employé n°350 par 1200
        }

        $resultat = $pdo->exec("UPDATE employes SET salaire = 1300 WHERE id_employes = 350 ");
        echo "nombre d' enregistrement affecté(s) par l' UPDATE : $resultat <br>";

        // DELETE supprimer employé 350

        $resultat = $pdo->exec("DELETE FROM employes WHERE id_employes = 350 ");
        echo "nombre d' enregistrement affecté(s) par le DELETE : $resultat <br>";

        echo '<hr><h2 class="display-4 text-center">03. PDO : SELECT + FETCH_ASSOC (1 seul résultat)</h2><hr>';

        $result = $pdo->query("SELECT*FROM employes WHERE id_employes = 415");
        // query permet de selectionner, appeler des données ( alors que exec ne le peut pas)
        // utiliser query pour select et exec pour insert, update, delete

        echo '<pre>';
        var_dump($result);
        echo '</pre>';
        echo '<pre>';
        print_r(get_class_methods($result));
        echo '</pre>';

        $employe = $result->fetch(PDO::FETCH_ASSOC);
        // retourne un tableau ARRAY indexé avec le nom des champs

        // $employe = $result->fetch(PDO::FETCH_NUM); // retourne un tableau ARRAY indexé numériquement

        // $employe = $result->fetch(PDO::FETCH_BOTH);// retourne un tableau ARRAY indexé à la fois numériquement et avec le nom des champs

        // il n'est pas possible d'associer 2 fois la meme methode sur le meme resultat
        echo '<pre>';
        print_r($employe);
        echo '</pre>';

        // exo afficher les infos a l' aide d' un affichage conventionnel, en excluant l' id

        echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-success text-center ">';
        foreach ($employe as $key => $value) {
            if ($key != 'id_employes') {
                echo "$key : $value <hr>";
            }
        }
        echo '</div>';

        echo '<hr><h2 class="display-4 text-center">04. PDO : QUERY + SELECT + WHILE (plusieurs résultats)</h2><hr>';

        $resultat = $pdo->query("SELECT * FROM employes");

        echo "<pre>";
        var_dump($resultat);
        echo "</pre>";

        // en executant une requete de selection, on obtient en retour un objet PDOStatement. Cet objet est inexploitable en l' état. On lui associe donc la methode FETCH qui retourne un tableau.
        // pour récupérer l' ensemble des employés, dans le cas qui nous occupe ( masi pas tout le temps donc), on va créer une boucle
        // $employes receptionne un tableau array d' un employé par tour de boucle
        while ($employes = $resultat->fetch(PDO::FETCH_ASSOC))
            // les :: permettent de faire appel a une constante de la classe PDO sans devoir l' instancier (créer un objet)
            {
                echo "<pre>";
                print_r($employes);
                echo "</pre>";
                echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center ">';
                echo $employes['nom'] . '<hr>';
                // pour chaque tour de boucle, donc pour chaque tableau ARRAY, on va crocheter aux différents indices
                echo $employes['prenom'] . '<hr>';
                echo $employes['service'] . '<hr>';
                echo $employes['salaire'];
                echo '</div>';
            }

        echo '<hr><h2 class="display-4 text-center">05. PDO : QUERY + FETCHALL + FETCH_ASSOC (plusieurs résultats</h2><hr>';

        $resultat = $pdo->query("SELECT * FROM employes");

        $donnees = $resultat->fetchALL(PDO::FETCH_ASSOC);
        // fetchALL retourne un tableau multidimentionnel, avec chaque tableau (de chaque employé) array indexé numériquement
        echo '<pre>';
        print_r($donnees);
        echo '</pre>';

        // afficher successivement les données de chaque employé avec une boucle foreach

        foreach ($donnees as $key => $tab) {
            echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center ">';
            foreach ($tab as $key2 => $value) {
                echo "$key2 : $value .<hr>";
            }
            echo '</div>';
        }

        echo '<hr><h2 class="display-4 text-center">05. PDO : QUERY + FETCHALL + BDD </h2><hr>';

        // exo: afficher la liste des bases de données, puis les mettre dans une liste ul li

        





        ?>

    </div>


    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>