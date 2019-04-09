<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau Fruits</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container text-center">

        <h1 class="display-4">Tableaux Fruits/ Poids</h1>

        <!-- 
        exo: 1- D�clarer un tableau ARRAY avec tout les fruits
	2- D�clarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.
	3- Affichez les 2 tableaux
	4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres � la fonction "calcul()" et obtenir le prix.
	5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).
	6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriqu�e).
	7- Faire un affichage dans une table HTML pour une pr�sentation plus sympa.
     -->
        <?php
        require_once('focntion.php');
        // rappel de la fonction, a faire en début,  par convention


        // exo 1 et 2
        $listeFruits = array("cerises", "bananes", "pommes", "peches");
        $listePoids = array(100, 500, 1000, 1500, 2000, 3000, 5000, 10000);
        //  les quotes ne sont pas obligatoires car ce sont des integer

        // exo 3
        echo '<pre>';
        print_r($listeFruits);
        echo '</pre>';
        echo '<pre>';
        print_r($listePoids);
        echo '</pre>';

        // exo 4
        echo '<hr>' . calcul($listeFruits[0], $listePoids[1]) . '<hr>';

        // exo 5
        echo '<div class="col-md-6 offset-md-3 mx-auto alert alert-info text-center">';

        foreach ($listePoids as $poids) {
            echo calcul($listeFruits[0], $poids);
            //            cerises,   100 (pour le premier tour de boucle)
            //  dans la fonction, on est obligé de lui rappeler $poids, même si on l' indique a coté du foreach
        }
        echo '</div>';

        // exo6
        foreach ($listeFruits as $fruit)
            {
                echo '<div class="col-md-6 offset-md-3 mx-auto alert alert-info text-center">';
                foreach($listePoids as $poids)
                {
                    echo calcul($fruit, $poids) . '<hr>';
                }
                echo '</div>';
            }

        // exo7
        echo '<table class="table table-bordered text-center"><tr>';
        echo "<th>Poids</th>";
        foreach($listeFruits as $fruit)
        {
            echo "<th>$fruit</th>";
        }
        echo '</tr>';
        foreach($listePoids as $poids)
        {
            echo '<tr>';
            echo "<th>$poids g</th>";
            foreach($listeFruits as $fruit)
            {
                echo "<td>" . calcul($fruit, $poids) . "</td>";
            }
            echo'</tr>';
        }
        
        echo '</table>';



        ?>





    </div>

    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea 6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>