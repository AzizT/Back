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
        // $resultat contient un integer. Il garde en mémoire le nombre de modifications. Mais on ne peut l' associer directement a exec ou query. Par contre on lm' appelle dans l' echo pour "déstocker" l' integer qu' il a en  mémoire dont on a besoin

        // DELETE supprimer employé 350

        $resultat = $pdo->exec("DELETE FROM employes WHERE id_employes = 350 ");
        echo "nombre d' enregistrement affecté(s) par le DELETE : $resultat <br>";

        echo '<hr><h2 class="display-4 text-center">03. PDO : SELECT + FETCH_ASSOC (1 seul résultat)</h2><hr>';

        $result = $pdo->query("SELECT*FROM employes WHERE id_employes = 415");
        // query permet de selectionner, appeler des données ( alors que exec ne le peut pas)
        // utiliser query pour select et exec pour insert, update, delete
        // query peut faire un insert, delete etc...sauf que lui ne peut afficher le résultat des modifs => mieux utiliser exec donc

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

        // en executant une requete de selection, on obtient en retour un objet PDOStatement. Cet objet est inexploitable en l' état. On lui associe donc la methode FETCH / fetchAll (Class PDOStatement) qui retournent un tableau ( Fetch => tableau array/ FetchAll => tableau multidimentionnel)
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

        echo '<hr><h2 class="display-4 text-center">05. PDO : QUERY + FETCHALL + FETCH_ASSOC (plusieurs résultats)</h2><hr>';

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

        $resultat = $pdo->query("SHOW DATABASES");
        echo '<pre>';
        print_r($resultat);
        echo '</pre>';
        echo '<ul class="col-md-4 offset-md-4 mx-auto list-group text-center">';

        while ($data = $resultat->fetch(PDO::FETCH_ASSOC)) {
            // echo '<pre>'; print_r($data); echo '</pre>';
            echo '<li class="list-group-item">' . $data['Database'] . '</li>';
        }
        echo '</ul>';



        // Methode Djamila, qui reprend la logique précédente, + compréhensible
        // $resultat = $pdo->query("SHOW DATABASES");// je cree ma variable resultat

        // $donnee = $resultat->fetchALL(PDO::FETCH_ASSOC);

        // echo "<pre>"; print_r($donnee); echo"</pre>";

        // echo '<ul>';

        // foreach($donnee as $key=> $tab1)

        // {

        //     foreach($tab1 as $key2=> $value){

        //         echo  '<li>'; 

        //          echo "$key2 : $value";

        //           echo '</li>';

        //     }





        //   }

        // echo'</ul>';

        echo '<hr><h2 class="display-4 text-center">07. PDO : QUERY + TABLE </h2><hr>';

        /*
        columnCount est une méthode/fonction de la class PDOStatement qui retourne le nombre de colonne selectionnées via la requete de selection.
        Dans notre cas, elle va retourner integer 7, donc la  boucle for va tourner 7 fois ( autant de fois qu' il y a de colonnes)

        getColumnMeta() est une methode issue de la class PDOStatement qui permet de récolter les informations des champs/ colonnes selectionnées
        */
        $resultat = $pdo->query("SELECT * FROM employes");
        echo '<table class="table table-bordered text-center"><tr>';
        for ($i = 0; $i < $resultat->columnCount(); $i++) {
            $colonne = $resultat->getColumnMeta($i);
            // echo "<pre>";  print_r($colonne);   echo "</pre>";
            echo "<th>$colonne[name]</th>";
            // on crochete a l' indice [name] pour afficher en entete le nom de la colonne par tour de boucle
        }

        echo '</tr>';
        while ($employe = $resultat->fetch(PDO::FETCH_ASSOC))
            // $employe receptionne un tableau array par employés par tour de boucle
            {
                // echo "<pre>";  print_r($employe);   echo "</pre>";
                echo '<tr>';
                foreach ($employe as $value)
                    // la boucle foreach permet de parcourir chaque tableau array de chaque employé
                    {
                        echo "<td>$value</td>";
                    }

                echo '</tr>';
            }
        echo '</table>';

        // exo: faire la même chose en utilisant fetchall

        $resultat = $pdo->query("SELECT * FROM employes");
        $employes = $resultat->fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($employe);
        echo "</pre>";

        echo '<table class="table table-bordered text-center"><tr>';

        foreach ($employes[0] as $key => $value)
            // on crochete au premier indice, [0], du tableau milti pour récupérer les indices et les stocker dans les entetes <th></th>
            {
                echo "<th>$key</th>";
            }

        echo '</tr>';
        foreach ($employes as $tab) {
                echo '<tr>';
                // on crée une ligne par employé
                foreach ($tab as $infos)
                    // cette boucle permet de parcourir chaque tableau ARRAY de chaque employé
                    {
                        echo "<td>$infos</td>";
                    }
                echo '</tr>';
            }
        echo '</table>';

        echo '<hr><h2 class="display-4 text-center">08. PDO : PREPARE + BINDVALUE + EXECUTE </h2><hr>';

        // les requetes préparées permettent de formuler une seule fois la requete, puis de l' executer autant de fois que souhaité
        // 3 cycles dans une requete: analyse / interprétation / execution
        // les requetes préparées permettent de parer aux injections sql, cela permet de protéger les requetes sql

        $resultat = $pdo->prepare("SELECT*FROM employes WHERE prenom = :prenom");
        // ici on prépare la requete, mais on ne l' execute pas encore
        // :nom => marqueur nominatif que l' on peut comparer a une boite ou un tampon

        echo "<pre>";  print_r($resultat);   echo "</pre>";
        $resultat->bindvalue(':prenom', 'Aziz', PDO::PARAM_STR);
        // bindvalue(), methode PDOStatement, permet d' associer une valeur au marqueur nominatif ':prenom'
        // arguments bindvalue(nom_du_marqueur, valeur, type)
        // a ce stade, la requete n' est toujours pas  executée

        $resultat->execute();
        // execute() est une methode PDOStatement qui permet d' executer la requete préparée
        echo "<pre>";  print_r($resultat);   echo "</pre>";

        $employe = $resultat->fetch(PDO::FETCH_ASSOC);

        echo "<pre>"; print_r($employe);  echo "</pre>";
            echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center ">';
        foreach($employe as $key => $value)
        {
            echo "$key : $value<hr>";
        }

        echo '</div><hr>';

        $prenom = 'Yannis';
        // la valeur du marqueur peut-etre une valeur
        $resultat->bindvalue(':prenom', $prenom, PDO::PARAM_STR);
        // on change la valeur du marqueur sans avoir a reformuler la requete sql
        $resultat->execute();
        // execution de la nouvelle requete
        $employe = $resultat->fetch(PDO::FETCH_ASSOC);

        echo "<pre>"; print_r($employe);  echo "</pre>";


        ?>

    </div>


    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>