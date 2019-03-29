<?php
 //connexion à la BDD :
$pdo = new PDO(
    'mysql:host=localhost;dbname=haribo', // driver mysql (pourrait être oracle, IBM, ODBC...) + nom de la BDD
    //
    'root', // pseudo de la BDD
    '', // mdp de la BDD
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour afficher les messages d'erreur SQL
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8' // définition du jeu de caractère des échanges avec la BDD
    )
);

//variable d'affichage :
$contenu = "";

// je récupère les infos de ma BDD dans la variable $requet
$requet = $pdo->query("SELECT * FROM stagiaires");

// j'effectue une boucle pour afficher toutes les infos contenu dans ma BDD
while ($stagiaire = $requet->fetch(PDO::FETCH_ASSOC)) {
    $contenu .= '<tr>';
    $contenu .= '<th scope="row">' . $stagiaire['id_stagiaire'] . '</th>';
    $contenu .= '<td>' . $stagiaire['prenom'] . '</td> ';
    $contenu .= '<td>' . $stagiaire['yeux'] . '</td> ';
    $contenu .= '<td>' . $stagiaire['genre'] . '</td>';
    $contenu .= '</tr>';
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="">


</head>

<body>
    <div class="container">

        <h1 class="text-primary alert alert-secondary">Liste des apprenants :</h1>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Couleur des yeux</th>
                    <th scope="col">Genre</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $contenu;// j'affiche le contenu de ma BDD avec la variable $contenu ?>
            </tbody>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>