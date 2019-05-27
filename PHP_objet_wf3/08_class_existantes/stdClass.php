<?php
echo '<pre>'; print_r(get_declared_classes());'</pre>';

$tab = array('Mario', 'Yoshi', 'Toad', 'Bowser');
$objet = (object) $tab;
// on demande a transformer le tableau array en objet ( on fait un cast, une transformation)
echo '<pre>'; var_dump($objet) ; echo'</pre>';
// un objet fait partie de la classe StdClass ( class standard de php) lorsque celui ci est orphelin et n' a pas été instancié par un "new". L' objet n' est issu d' aucune class en particuler

// exo: afficher yoshi en passant par l' objet stdClass '$objet'
echo $objet->{1} . '-' . $objet->{2} . '<hr>';
// cette syntaxe permet d' afficher un élément de l' objet, concaténé avec un autre

foreach($objet as $key => $value)
// la boucle foreach permet de parcourir les données d' un tableau array, mais comme ici, un OBJET
{
    echo "$key - $value <br>";
}
?>