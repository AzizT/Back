<?php
function recherche($tab, $elem)
{
    if(!is_array($tab))
    throw new Exception('Vous devez envoyer un ARRAY');

    if(sizeof($tab) <= 0)
    throw new Exception('Vous devez envoyer un ARRAY avec un contenu');

    $position = array_search($elem, $tab);
    return $position;
}
$liste1 = array();
$liste2 = array('Mario', 'Yoshi', 'Toad', 'Bowser');

try
{
    echo "Position de Mario dans le tableau ARRAY : " . recherche($liste2, 'Mario') . '<hr>';
    echo "Position de Toad dans le tableau ARRAY : " . recherche($liste2, 'Toad') . '<hr>';
    echo "Position de Bowser dans le tableau ARRAY : " . recherche($liste1, 'Bowser') . '<hr>';
    echo "traitement....";
    // ne va pas s' afficher car le script s' arrete juste au dessus, dès l' erreur repérée (Bowser est dans un tableau inconnu)
    
}
catch(Exception $e)
// si erreur repérée, on tombe dans le catch. Cela permet de repérer les exceptions et de personnaliser le message d' erreur
{
    echo '<pre>'; print_r($e); echo'</pre>';
    echo '<pre>'; print_r(get_class_methods($e)); echo'</pre>';
    // exo: afficher une phrase comprtant le message d' erreur, le fichier ou se situe l' erreur, ainsi que la ligne incriminée
    echo "Message d' erreur : " .$e->getMessage() . " a la ligne " .$e->getLine() . " dans le fichier " . $e->getFile();
    // on parcours notre tableau array pour voir quels indices il faut appeler pour avoir nos infos
}

// il est possible de mettre plusieurs try/catch a la suite. Try et Catch sont indissociables, il faut les deux

echo '<hr><hr>';
// tenter de se connecter a une bdd

try{
    $bdd = new PDO('mysql:host=localhost;dbname=test2', 'root', '');
    echo "Connexion réussie !";
}
catch(PDOException $e)
{
    // exo: personnaliser un message d' erreur en cas de mauvais connexion
    echo '<pre>'; print_r($e); echo'</pre>';
    echo '<pre>'; print_r(get_class_methods($e)); echo'</pre>';
    echo "Message d' erreur : " . $e->getMessage() . " a la ligne " . $e->getLine() . " dans le fichier " . $e->getFile();
}

?>