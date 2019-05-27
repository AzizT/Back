<?php
function recherche($tab, $elem)
{
    if(!is_array($tab))
    // !is_array => not is_array
    {
        die('Vous devez envoyer un array');
    }
    $position = array_search($elem, $tab);
    // array_search est une focntion prédéfinie quip ermet de trouver la position d' un élément dans un tableau array
    // elle retourne l' indice qui correspond a l' élément
    return $position;
}
// ***************************************************************

$liste = array('Mario', 'Yoshi', 'Toad', 'Bowser');

echo "Position de Mario dans le tableau ARRAY : " . recherche($liste, 'Mario') . '<hr>';
echo "Position de Toad dans le tableau ARRAY : " . recherche($liste, 'Toad') . '<hr>';
echo "Position de Bowser dans le tableau ARRAY : " . recherche('$test', 'Toad') . '<hr>';
// une fois le Die executé, tous le reste du script est stoppé et n' apparaitra pas
echo 'yfuoiugip...';
?>