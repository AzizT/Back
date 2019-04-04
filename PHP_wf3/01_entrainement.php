<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrainement PHP</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>

<body>
    <div class="container">

        <h2 class="display-4 text-center">Ecriture et affichage</h2>
        <hr>
        <!-- ecrire du html dans un php est usuel, mais pas l' inverse. Impossible -->

        <?php
        // ouverture de la balise php.
        // on peut en ouvrir ( mais fermer ensuite) autant de fois que l' on veut, selon nos besoins

        echo 'Bonjour';
        // echo est une instruction d' affichage => "affiche moi"
        echo '<br>';
        // on peut ecrire des balises html dans du php
        print 'Salam alikoum';
        // autre instruction d' affichage, pas de différnece avec echo

        echo '<hr> <h2 class="display-4 text-center">Comment insérer du commentaire en php</h2><hr>';

        // fermeture de la balise php
        ?>
        <?= "Priviet" ?>
        <!-- le = remplace le echo -->
        <strong>Shalom</strong>
        <!--  il  est également possible de fermer et réouvrir des php pour mélanger du html et du php -->

        <?php
        echo 'Ni Hao';
        // ceci est un commentaire sur une seule ligne
        # idem, une seule ligne
        echo ' Sabah El Kheir';
        /*              commentaire sur 
                             plusieurs lignes
        */

        echo '<hr> <h2 class="display-4 text-center">Variables: Types/ Declarations/ Affectations</h2><hr>';
        //  Une variable est un espace nommé permettant de conserver une valeur

        $a = 127;
        // on ne peut ecrire de chiffre après $, mais on peut ecrire $a2 ( masi pas $2a). On ne peut ecrire aussi d' accents, d' espaces...
        // ici, nous avons affecté la valeur 127 a 'a'

        echo gettype($a);
        // le navigateur va nous retourner Integer, type de valeur de 127 ( un entier)
        echo '<br>';
        $b = 1.5;
        echo gettype($b);
        echo '<br>';
        // le navigateur va nous retourner: double. L' équivalent de Float pour le php

        $c = "une chaine";
        echo gettype($c);
        echo '<br>';
        // va nous retourner String

        $d = '127';
        echo gettype($d);
        echo '<br>';
        // toujours un string car même si c' est un chiffre, il est entre "" et est donc interprété comme une chaine de caracteres

        $e = true;
        echo gettype($e);
        echo '<br>';
        // va retourner Boolean

        echo '<hr> <h2 class="display-4 text-center">Concaténation</h2><hr>';

        $x = "Salam ";
        $y = "Alikoum";
        echo $x . $y . '<br>';
        //  le '.' est l' équivalent du + pour concaténer, en php

        $x = "Ni";
        $y = " Hao";
        echo "$x $y <br>";
        // fonctionne aussi sans la concaténation
        // fonctionne car double quote. Mais avec des simple quote, ne fonctionne pas ( les variables ne seront pas évaluées, elles deviennent des chaines de caracteres)

        echo 'aujourd\' hui';
        echo '<br>';
        // echo 'aujourd' ui'
        // pbs ci dessus car usage des simple quotes, en conflit avec l' apostrophe de 'hui...on peut mettre des double quote, ou un anti slash pour que le navigateur interprete ça bien

        echo $x, " doit précéder ", $y, " pour signifier: bonjour en Pin Yin";
        // le point, comme ci dessus la virgule, servent a concaténer
        echo '<br>';

        echo '<hr> <h2 class="display-4 text-center">Concaténation lors de l\' affectation</h2><hr>';

        $prenom1 = "Mourad";
        $prenom1 = "Bruno";
        echo $prenom1 . '<br>';
        // Va afficher Bruno, car la réaffectation a ecrasé la valeur de la premiere affectation

        $prenom2 = "Mourad";
        $prenom2 .= " Bruno";
        echo $prenom2 . '<br>';
        // ici, grace a ".=" on va afficher " Mourad Bruno". On ajoute, et non remplace les deux  affectations

        echo '<hr> <h2 class="display-4 text-center">Constante et constante magique</h2><hr>';
        // une constante comme une variable permet de conserver une valeur, sauf qu' on ne pourra lui réaffecter une autre valeur

        define("CAPITALE", "Paris");
        // la constante, par convention, est toujours declarée en majuscule. Ici, la constante est capitale, a laquelle on affecte la valeur Paris

        echo CAPITALE . '<br>';

        // define("CAPITALE", "Rome");
        // nou affiche une erreur car la constante est déjà définie

        // constant magique
        // double underscore _
        echo __FILE__ . '<br>';
        // affiche le chemin complet vers le fichier
        echo __LINE__ . '<br>';
        // affiche le numéro de la ligne

        // __FUNCTION__ / __CLASS__ / __METHOD__

        // exo: afficher vert-jaune-rouge (avec les tirets) en mettant chaque couleur dans une variable. Faire en sorte que chaque mot soit de la bonne couleur

        // ci dessous, mon exo

        // $v = 'vert';
        // $j = 'jaune';
        // $r = 'rouge';
        // echo "<font color = green>" . $v . "<font color = black> - " . "<font color = yellow>" . $j . "<font color = black> - "  . "<font color = red>" . $r . '<br>';

        // correction du formateur

        $vert = '<span class="text-success">vert</span>';
        $jaune = '<span class="text-warning">jaune</span>';
        $rouge = '<span class="text-danger">rouge</span>';
        // $rouge = '<span style="color:red">rouge</span>
        // la solution juste ci dessus est valable si on n' est pas sur Bootstrap

        echo "$vert-$jaune-$rouge<br>";
        // ou alors
        echo $vert . '-' . $jaune . '-' . $rouge . '<br>';

        echo '<hr> <h2 class="display-4 text-center">Opérateurs arithmétiques</h2><hr>';

        $a = 10;
        $b = 2;
        echo $a + $b . '<br>';
        echo $a - $b . '<br>';
        echo $a * $b . '<br>';
        echo $a / $b . '<br>';

        // Opérateurs et affectations
        $a += $b;
        // équivaut a $a = $a + $b
        echo $a . '<br>';
        $a -= $b;
        // équivaut a $a = $a - $b
        echo $a . '<br>';
        $a *= $b;
        // équivaut a $a = $a * $b
        echo $a . '<br>';
        $a /= $b;
        // équivaut a $a = $a / $b
        echo $a . '<br>';

        echo '<hr> <h2 class="display-4 text-center">Structures conditionelles (if/else) - opérateurs de comparaison</h2><hr>';

        //  Isset & Empty

        $var1 = 127;
        $var2 = '';

        if (empty($var1)) {
            echo " 0, vide ou non défini <br>";
        } else {
            echo " Cette variable n' est pas vide<br>";
            //  empty permet de tester si une variable ou non, et donc cette condition sera TRUE ou FALSE. Ici, FALSE, donc retournera le second echo
        }
        if (isset($var2)) {
            echo "var2 existe et est définie par rien<br>";
            //  isset teste l' existance d' une variable
        } else {
            echo "var2 n' existe pas";
        }

        /*
        OPERATEURS DE COMPARAISONS
        = égal à
        == comparaison de la valeur
        === comparaison de la valeur et du type
        < strictement inférieur à
        > strictement supérieur à
        <= inférieur ou égal
        >= supérieur ou égal
        ! n' est pas
        != différent de
        ||, OR => OU
        &&, AND => ET
        XOR: condition exclusive
        */

        $a = 10;
        $b = 5;
        $c = 2;
        if ($a > $b) {
            echo " A est bien supérieur a B<br>";
            // cas par défaut. Ou sinon, c' est le code du else qui va etre affiché
        } else {
            echo " non, c' est B qui est supérieur a A<br>";
        }

        //  if / else if / else

        if ($a > $b && $b > $c) {
            echo " ok, les deux conditions sont réunies<br>";
        } elseif ($a == 9 || $b > $c) {
            echo "Au moins une des deux conditions est fausse";
        } else {
            echo "tout est faux";
        }
        // elseif permet d' ajouter des cas supplémentaires a la condition IF
        // il peut y avoir plusieurs ELSEIF dans une même condition
        // si une des conditions supérieurs est vérifiée, ELSEIF bloque le script et toutes les conditions suivantes seront bloquées

        // condition exclusive
        if ($a == 10 xor $b == 6) {
            echo 'ok, condition exclusive<br>';
        }
        // XOR, condition exclusive, autorise juste une seule condition vraie. Si les deux ( ou encore plus) sont vraies, ou toutes fausses, alors XOR ne peut s' appliquer, et donc FALSE

        // forme contractée: 2éme possibilité d' ecriture
        echo ($a = 10) ?" A est égal a 10 <br>" : "A n' est pas égal a 10<br>";
        // condition ternaire: le ? remplace le IF, et les deux points le "ELSE"

        //  comparaison

        $varA = 1;
        $varB = '1';
        if ($varA == $varB) {
            echo "il s' agit de la même valeur<br>";
            // Ca fonctionne avec le double égal, mais pas le triple, car si la valeur est la même, le type non ( INTEGER vs STRING)...voir plus haut
        }

        echo '<hr> <h2 class="display-4 text-center">Condition SWITCH</h2><hr>';

        $perso = 'Mario';
        switch ($perso) {
            case 'Luigi';
                echo "Vous avez choisi $perso <br>";
                break;
            case 'TOAD';
                echo "Vous avez choisi $perso <br>";
                break;
            case 'Bowser';
                echo "Vous avez choisi $perso <br>";
                break;
            default:
                echo "Vous etes fou, c' est Mario le meilleur <br>";
                break;
                // si on a une grande comparaison de cas, la condition SWITCH est a privilégier.
                // 'case' représente les cas dans lesquels nous pouvons potentiellement tomber
                // 'break' permet de stopper le script si nous rencontrons un des cas
        }

        // exo: faire la même chose avec du if, elseif, else
        // mon travail

        $perso = 'Mario';
        if ($perso == 'Luigi') {
            echo "Vous avez choisi $perso <br>";
        } elseif ($perso == 'Toad') {
            echo "Vous avez choisi $perso <br>";
        } elseif ($perso == 'Bowser') {
            echo "Vous avez choisi $perso <br>";
        } else {
            echo "Vous etes fou, c' est Mario le meilleur <br>";
        }

        echo '<hr> <h2 class="display-4 text-center">Fonctions prédifinies</h2><hr>';

        // tout retrouver sur php.net, liste des fonctions et méthodes

        echo 'Date: ' . date("l/d/m/Y") . '<br>';
        // lorsqu' on utilise une fonction prédifinie, il faut toujours savoir quoi envoyer comme argument, et ce que la fonction va retourner
        //  ci dessus, les arguments de date() sont l/d/m/Y...

        echo '<hr> <h2 class="display-4 text-center">Traitements des chaines</h2><hr>';

        // strpos() => string position

        $email = "aziz.tobbal@dbmail.com";
        echo strpos($email, "@");
        echo '<br>';
        // va afficher 11, car 11 caracteres avant @

        $email = "gregorylacroix78@gmail.com";
        echo strpos($email, "@");
        echo '<br>';
        // ici 16, car 16 caracteres avant @
        // fonction prédifinie qui permet de trouver la position du caractere dans la chaine
        // on lui donne deux arguments ( entre parentheses): la chaine dans laquelle chercher, puis le caractere a situer ( utile pour vérifier le format d' un mail)

        $email12 = "bonjour";
        echo strpos($email12, "@");
        echo '<br>';
        // cette ligne ne sort rien, pourtant il y a bien qlq chose dedans: FALSE
        // var_dump() permet d' apercevoir le FALSE. C' est donc une instruction d' affichage améliorée que l'on utilise régulierement en phase de developpement
        // il existe aussi print_r()
        var_dump(strpos($email12, "@"));
        echo '<br>';

        // iconv_strlen

        $phrase = "Mettez une phrase ici a cet endroit";
        echo iconv_strlen($phrase) . '<br>';
        // iconv_strln est une fonction prédifinie qui permet de connaitre le nombre de caracteres d' un string
        // on peut l' utiliser pour savoir si un pseudo, un mdp ont une taille conforme lors de l' inscription

        // substr()
        $texte = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, voluptatum perspiciatis. Animi voluptate, deleniti asperiores perspiciatis laboriosam iusto expedita eaque corrupti a architecto id, labore excepturi iste dolores quo eligendi!";

        echo substr($texte, 0, 20) . "...<a href=''>Lire la suite</a>";
        // c' est une fonction prédifinie permettant de retourner une partie de la chaine...
        // les argume,nts a donner sont:
        // la chaine a couper
        // la position du début
        // la position de fin
        // substr permet de couper un article pourne donner que l' accroche

        echo '<hr> <h2 class="display-4 text-center">Fonctions utilisateurs</h2><hr>';
        // elles permettent d' éviter de copier / coller un code récurent.
        // on l' enca^psule dans une fonction

        function separation()
        {
            echo "<hr><hr><hr>";
        }
        separation();
        // execution de la fonction

        // fonction avec arguments
        function bonjour($qui)
        {
            return "Bonjour $qui <br>";
            // permet de retourner le résultat, mais ne l' affiche pas
        }
        echo bonjour('Gregory');
        //  execution de la variable
        // quand i y a un return dans la fonction, i l faut faire un echo avant

        $prenom = 'Jacques';
        echo bonjour($prenom);
        // l' argument peut aussi etre une variable

        // ********************************************
        function appliqueTva($nombre)
        {
            return $nombre * 1.2;
        }
        echo "500 euros avec 20% de tva: " . appliqueTva(500) . '<br>';
        // pour calculer la tva de 500

        /* Exo: améliorer cette fonction piur qu' elle calcule un nombre avec le tx de tva de notre choix ( 19.6, 5.5, 7% etc....)


             */
        // mon travail
        // function appliqueTvaRandom($nombre, $x)
        // {
        //     $tx = 1 + $x / 100;
        //     return $nombre * $tx;
        //     un seul return par fonction, sinon, break, et ne s' occupe plus du reste
        // }
        // echo "500 euros avec 5.5% de tva: " . appliqueTvaRandom(500, 5.5) . '<br>';
        /*
        Correction du formateur
        */
        function appliqueTva2($nombre, $tx)
        {
            return $nombre * (1 + $tx / 100);
        }
        echo "500€ avec tva 19.6% font: " . appliqueTva2(500, 19.6) . '<br>';

        // *************************************************
        echo meteo("été", 20);
        // il est possible d' executer une fonction avant qu' elle ne soit declarée dans le code
        function meteo($saison, $temperature)
        {
            return "Nous sommes en $saison et il fait $temperature degrés <br>";
        }
        // exo gérer le s de degrés en fonction de la température. Gérer aussi le cas de figure: en été, au printemps etc....

        // mon travail
        // echo meteo2("printemps", -15);
        // function meteo2($saison, $temperature)
        // {
        //     if ($temperature <= 1 && $saison == "printemps") {
        //         return "Nous sommes au $saison et il fait $temperature degré <br>";
        //     } elseif ($temperature <= 1 && $saison != "printemps") {
        //         return "Nous sommes en $saison et il fait $temperature degré <br>";
        //     } elseif ($temperature > 1 && $saison = "printemps") {
        //         return "Nous sommes au $saison et il fait $temperature degrés <br>";
        //     } else {
        //         "Nous sommes en $saison et il fait $temperature degré <br>";
        //     }
        // }

        // correction du formateur
        function exoMeteo($saison, $temperature)
        {
            if ($temperature > 1 || $temperature < -1)
                $degre = "degrés";
            else
                $degre = "degré";

            if ($saison == "printemps")
                $art = "au";
            else
                $art = "en";
            return " nous sommes $art $saison et il fait $temperature $degre <br>";
        }
        echo exoMeteo('été', 2);
        echo exoMeteo('automne', -2);
        echo exoMeteo('hiver', 0);
        echo exoMeteo('printemps', 0);

        // espace global et local

        function jourSemaine()
        {
            $jour = 'jeudi';
            return $jour;
            echo 'Salut';
        }
        // echo $jour;
        // ligne ci dessus va retourner Undefined, car pour lui les deux $ ne sont pas similaires. Une variable d' une fonction ( espace local) ne peut -etre appelée a l' extérieur ( espace global). Il faut ecrire les lignes ci dessous ( on crée une variable pour récupérer l' entrée)
        $recup = jourSemaine();
        echo $recup . '<br>';

        // ***********************************************

        $pays = "France";
        function affichagePays()
        {
            global $pays;
            return $pays;
        }
        echo affichagePays();
        // la terminologie "global" permet d' importer une variable de l' espace global vers l' espace local, sinon, UNDEFINED

        echo '<hr> <h2 class="display-4 text-center">Structure itérative: les boucles</h2><hr>';

        // Boucle While
        $i = 0;
        while ($i < 5) {
            echo "$i---";
            $i++;
        }
        echo '<br>';

        // exo => faire en sorte que pour le dernier tour de boucle les tirets n' existent plus

        /* Mon Travail
        $i = 0;
        while ($i < 4) {
            echo "$i---";
            $i++;
        }
        if ($i < 3) {
            echo "$i---";
        }else{
            echo "$i";
        } */
        // correction du formateur
        $j = 0;
        while ($j < 5) {
            if ($j == 4)
                echo $j;
            else
                // pas ouvrir une seconde accolade pour le else, dans la même que le if
                echo "$j---";
            $j++;
        }
        echo '<br>';

        // la boucle for
        // même principe que la while, sauf que tout va se passer entre les parentheses ( initialisation, condition d' entrée, incrémentation)
        for ($j = 0; $j < 16; $j++) {
            echo "$j-";
        }

        echo '<br>';
        // exo afficher un selecteur de 30 options avec une boucle

        echo '<hr><select>';
        for ($v = 1; $v < 31; $v++) {
            echo "<option>$v</option>";
        }
        echo '</select>';
        // echo du select fermant obligatoire pour la suite du code

        echo '<br>';
        // exo: faire une boucle qui affiche de 0 a 9 sur la même ligne ( 10 tours)

        $a = 0;
        while ($a < 10) {
            echo "$a-";
            $a++;
        }
        echo '<br>';
        // exo: faire une boucle qui affiche de 0 a 9 sur la même ligne, dans un tableau
        /*Mon travail
        echo '<tr><td>';

        for ( $b = 0; $b <10; $b++){
            echo "<td> $b |</td>";
        }
        
        echo '</td></tr>'; */

        // correction du formateur
        echo '<table class="table table-bordered text-center"><tr>';

        for ($b = 0; $b < 10; $b++) {
            echo "<td> $b</td>";
        }

        echo '</tr></table><hr>';

        echo '<br>';

        // faire la même chose, de 0 a 99, sur  10 lignes, mais sans faire 10 boucles ( principe de la boucle imbriquée)


        echo '<table class="table table-bordered text-center"><tr>';

        // mon travail
        // for ($c = 0; $c < 10; $c++)
        //     for($d = 0; $d <10; $d++) {
        //     echo "<td> $c</td>";
        // }

        // echo '</tr></table><hr>';

        // echo '<br>';

        // correction
        $compteur = 0;
        // le compteur qui va s' incruster dans les td
        echo '<table class="table table-bordered text-center">';

        for ($ligne = 0; $ligne < 10; $ligne++)
            // la boucle qui va créer les lignes ( 10 tel que demandé)
            {
                echo '<tr>';
                for ($cellule = 0; $cellule < 10; $cellule++)
                    // la boucle qui va créer les cellules - colonnes. A chaque fois qu' on crée dix colonnes, on crée une nouvelle ligne etc...
                    {
                        echo "<td>$compteur</td>";
                        // on rappelle ici la variable compteur pour remplir les cellules (td)de notre tableau
                        $compteur++;
                        // le compteur va aller jusqu' a 99, ne va pas se réinitialiser, car on ne l'a pas borduré comme la création de ligne ou de colonnes (<10)
                    }

                echo '</tr>';
            }

        echo '</table>';

        echo '<hr> <h2 class="display-4 text-center">Tableau de données Array</h2><hr>';

        // un tableau ARRAY est declaré un peu comme une variable améliorée car on ne conserve pas qu' une, mais un ensemble de valeurs

        $liste = array("Grégory", "Aziz", "Nassim", "Sylvain", "Nelson");
        // deux manières de créer un tableau ( en declarant un array ou en mettant des crochets)
        $liste = ["Grégory", "Aziz", "Nassim", "Sylvain", "Nelson"];
        // echo $liste;
        // générer une erreur car on ne peut afficher un array avec un simple écho

        // var_dump($liste);
        // permet d' afficher les éléments du array; leur type, length etc....

        echo '<pre>';
        var_dump($liste);
        echo '</pre>';

        echo '<pre>';
        print_r($liste);
        echo '</pre>';
        // la balise <pre>nt permet d' afficher des infos meiux présentées, avec d' autres infos, tel que l' indice
        // elle permet de formater la sortie du print_r et du var_dump
        // ces intructions d' affichage améliorées permettent de consulter et d' afficher les données d' un tableau, d' une variable, d' un objet etc....

        /*
        ---------------------------
        | Indice    | valeur      |
        ---------------------------
        |      00   | Grégory     |
        ---------------------------
        |      01   | Aziz        |
        ---------------------------
        |     02    | Nassim      |
        ---------------------------
        |     03    | Sylvain     |
        ---------------------------
        |     04    | Nelson      |
        ---------------------------
        */

        // exo: tenter de sortir nassim en passant par le tableau de données ARRAY sans ecrire echo nassim
        // même technique qu' en JS
        echo $liste[2];
        '<br>';

        echo '<hr> <h2 class="display-4 text-center">Boucle foreach pour les tableaux de données ARRAY</h2><hr>';

        $tab[] = "France";
        // encore une autre manière de créer un tableau => les crochets vides qui permettent de générer des indices numériques
        $tab[] = "Angleterre";
        $tab[] = "Espagne";
        $tab[] = "Italie";
        $tab[] = "Portugal";

        echo '<pre>';
        print_r($tab);
        echo '</pre>';

        // la boucle foreach permet de passer en revue tous les éléments d' un tableau ( mais aussi des objets...nous verrons cela un peu après)

        //     ---------------------------
        //     | Indice    | valeur      |
        //     ---------------------------
        //     |     00    | France      |
        //     ---------------------------
        //     |     01    | Angleterre  |
        //     ---------------------------
        //     |     02    | Espagne     |
        //     ---------------------------
        //     |     03    | Italie      |
        //     ---------------------------
        //     |     04    | Portugal    |
        //     ---------------------------

        foreach ($tab as $value)
            // la boucle foreach est un moyen simple de passer en revue un tableau de données array
            //  as fait partie du langage et est obligatoire. $value est une variable de reception que nous nommons. Elle receptionne une valeur du tableau par tour de boucle
            {
                echo "$value<br>";
            }
        // value va parcourir les valeurs du tableau, et ne transmettre que cela => la valeur, sans l'indice, affichable pour l' utilisateur ( et non pas avec un array comme avant)

        // ---------------------------------------------------------------------------------------------------------

        // on peut aussi afficher deux éléments

        foreach ($tab as $key => $value) {
            echo "$key équivaut à $value<br>";
        }
        // les noms de variables utilisées ici ne sont pas obligatoires. On pourrait les appeler comme on veut $aziz etc...LEUR DECLARATION SE FAIT AU MOMENT OU ON LES APPELLE. PAS BESOIN DE LES DECLARER AU PREALABLE OU D' UTILISER UN NOM PREDEFINI
        // la fleche => est par contre obligatoire dans la boucle foreach ( mais pas dans le echo)

        ?>

        <hr>
        <!-- autre possibilité d' ecriture -->

        <?php foreach ($tab as $key => $value) : ?>

            <?= $key; ?> => <?= $value; ?> <br>

                                            <?php endforeach; ?>
        <br>
        <?php

                    $perso = array("m" => "Mario", "l" => "Luigi", "a" => "Aziz", "n" => "Nassim");
                    echo '<pre>';
                    print_r($perso);
                    echo '</pre>';

                    echo "taille du tableau : " . count($perso) . '<br>';
                    echo "taille du tableau : " . sizeof($perso) . '<br>';
                    //  sizeof et count retournent la taille d' un tableau ARRAY => combien d' éléments a l' intérieur. Pas de différnece entre les deux méthodes

                    echo implode("-", $perso);
                    // implode permet l' extration des données, en mettant un séparateur
                    //  c'est une fonction prédéfinie qui rassemble les éléments d' un tableau en une chaine de caracteres, séparées par un caractere

                    echo '<hr> <h2 class="display-4 text-center">Tableau ARRAY multidimensionnel</h2><hr>';

                    // tableau contenu dans un autre tableau => multidimensionnel

                    $tab_multi = array(
                        0 => array("nom" => "Chadli", "salaire" => 100000),
                        1 => array("nom" => "Mobutu", "salaire" => 100000000),
                        2 => array("nom" => "Amin Dada", "salaire" => 10000000000000)
                    );
                    echo '<pre>';
                    print_r($tab_multi);
                    echo '</pre>';

                    // exo tenter de sortir "Chadli" en passant par le tableau multi sans faire un echo Chadli

                    echo $tab_multi[0]['nom'] . '<hr>';

                    // exo afficher l' ensemble du tableau multi a l' aide d' une boucle foreach
                    foreach ($tab_multi as $key => $tab)
                        // ici ce key représentera l' indice ( 0 et 1) et le tab le array ( chacun des deux tableaux)
                        {
                            echo '<div class="col-md-3 offset-md-5 alert alert-success text-dark mx-auto text-center">';
                            foreach ($tab as $key2 => $value) {
                                // on rappelle notre $tab, car il faut linker le foreach dans le foreach
                                echo "$key2 => $value <br>";
                            }
                            echo '</div>';
                        }
                    echo '<hr>';

                    // ********************************************************************************************************

                    for ($i = 0; $i < count($tab_multi); $i++) {
                        // la boucle for permet de tourner autant de fois qu' il y a de lignes dans le tableau multi, donc 3 boucles dans ce cas précis
                        // on se sert de la variable $i de la boucle for pour aller crocheter a chaque indice du tableau multi et parcourir les données
                        // la différence avec la "double foreach", c' est que tout va se passer dans un premier temps dans les parentheses ( initialisation, condition d' entrée, incrémentation), puis on lui donne une foreach classique
                        echo '<div class="col-md-3 offset-md-5 alert alert-warning text-dark mx-auto text-center">';
                        foreach ($tab_multi[$i] as $key => $value) {
                            echo "$key => $value <br>";
                        }
                        echo '</div>';
                    }

                    echo '<hr> <h2 class="display-4 text-center">Super globales</h2><hr>';

                    // https://www.php.net/manual/fr/language.variables.superglobals.php

                    //  ce sont des variables de type array et elles sont accessibles de partout. A la fois dans l' espace global et local, elles permettent de véhiculer des données
                    /*
                    
                    $_SERVER : véhicule les données liées au serveur
                    $_GET : " " " transmises dans l' URL
                    $_POST : " " " d' un formulaire
                    $_FILES : " " " d' un fichier uploadé
                    $_COOKIE : " " " d' un fichier cookie
                    $_SESSION : " " " d' une session en cours
                    
                    Elles s' appliquent toujours avec le signe $ suivi d' un '_' et toujours en majuscule

                    */

                    echo '<pre>'; print_r($_SERVER); echo '</pre>';
                    // voir résultat sur navigateur


                    ?>


    </div>

    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>