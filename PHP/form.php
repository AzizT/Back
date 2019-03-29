<?php
// Ici j'affiche les infos que récupère grâce à la methode "post" du formulaire. Ceci m'aide à voir que mon formulaire envoie bien les données saisies.
echo '<pre style="background:teal;color:white;" >';
var_dump($_POST);
echo '</pre>';

// je créé ma variable d'affichage
$msg = "";

// Je vérifie les champs de mon formulaire
if ($_POST) {
    // Je vérifie que chaque champs n'esxistent pas ou bien qu'il ne correspondent pas à ce que j'attend. Dans ce cas un message d'erreur sera affiché.
    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 100) {
        $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre prénom ( entre 3 et 100 caractères)</div>';
    } // FIN if (!isset($_POST['prenom'])
    if (!isset($_POST['yeux']) || strlen($_POST['yeux']) < 3 || strlen($_POST['yeux']) > 30) {
        $msg .= '<div class="alert alert-warning text-danger"> Veuillez choisir une couleur d\'yeux ( entre 3 et 30 caractères)</div>';
    } // FIN if (!isset($_POST['yeux'])
    if (!isset($_POST['genre']) || $_POST['genre'] != "f" && $_POST['genre'] != "h") {
        $msg .= '<div class="alert alert-warning text-danger"> Veuillez choisir un genre</div>';
    } // FIN if (!isset($_POST['genre'])

    // si Je n'ai pas de messaged'erreur j'effectue l'insertion à ma BDD 
    if (empty($msg)) {
        
        // 1 - Je me connect
        $pdo = new PDO(
            'mysql:host=localhost;dbname=haribo',
            'root',
            '',
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
            )
        );
        
        //2 - Je prépare l'insertion des valeur saisies dans les champs du formulaire
        $requet = $pdo->prepare("INSERT INTO stagiaires (prenom,yeux,genre) VALUES (:prenom,:yeux,:genre)");
        // J'associe les les valeurs saisies dans le  formulaire avec les marqueurs de securité php (:prenom,:yeux,:genre) 
        $requet->bindParam(':prenom', $_POST['prenom']);
        $requet->bindParam(':yeux', $_POST['yeux']);
        $requet->bindParam(':genre', $_POST['genre']);
        // J'execute l'insertion en BDD
        $requet->execute();
        // Je redirige vers la page qui affiche la liste des apprenants. 
        header('location:liste.php');
    }
} // FIN if ($_POST)

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
    <div class="container mt-5">

        <form method="post">
            <?php echo $msg; //j'affiche les messages d'erreur ?>
            <input type="text" name="prenom" placeholder="Prenom">
            <br><br>
            <input type="text" name="yeux" placeholder="yeux">
            <br><br>
            <select name="genre">
                <option value="g">-- Genre --</option>
                <option value="f">Femme</option>
                <option value="h">Homme</option>
            </select>
            <br><br>

            <input type="submit">


        </form>

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

</htm l>