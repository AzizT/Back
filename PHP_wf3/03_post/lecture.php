<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lecture fichier txt</title>
</head>
<body>

<?php

// nous avons réussi a introduire des infos dans un fichier txt. On peut aussi faire l' inverse, et les lire sur le navigateur

$nom_fichier = "liste.txt";
$fichier = file($nom_fichier);
// file est une fonction prédéfinie qui sert a récupérer des infos, les exporter dans un array

echo '<pre>'; print_r($fichier); echo '</pre>';

?>
    
</body>
</html>