<?php
$perso = array("m" => "Marion", "l" => "Luigi", "t" => "Toad", "b" => "Bowser");

$it1 = new ArrayIterator($perso);
echo '<pre>'; var_dump($it1); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($it1)); echo'</pre>';

$it1->rewind();
while($it1->valid())
{
    echo $it1->key() . ' - ' . $it1->current() . '<br>';
    $it1->next();
}

/*
- rewind permet de se placer au début des informations
- valid permet de vérifier qu' il y a des infos a parcourir ( tant qu' il y en a, je continue)
- key permet d' afficher l' indice
- current permet d' afficher la valeur
- next permet de passer a l' info, élément suivant ( comparable a une incrémentation $i++)
*/

$it2 = new SimpleXmlIterator('liste.xml', null, true);
echo '<pre>'; var_dump($it2); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($it2)); echo'</pre>';

$it2->rewind();
while($it2->valid())
{
    echo $it2->key() . ' - ' . $it2->current() . '<br>';
    $it2->next();
}

// iterator est un design pattern qui permet de définir une solution pratique a un probleme fréquent. Un pattern propose une structure commune

// exo : faire la même chose avec classe directoryIterator()
$it3 = new DirectoryIterator('..');
echo '<pre>'; var_dump($it3); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($it3)); echo'</pre>';

$it3->rewind();
while($it3->valid())
{
    echo $it3->key() . ' - ' . $it3->current() . '<br>';
    $it3->next();
}

// dans les 3 cas, nous avons des données de type différent, mais nous avons la meme structure de code permettant de parcourir les données. Les mêmes methodes sont présentes dans les 3 class différentes
?>