<?php
class Ecole
{
    public $nom = "POLES";
    public $cp = 94;
    public function __clone()
    {
        $this->cp = 92;
    }
}

$ecole = new Ecole;
$ecole->cp = 75;
echo '<pre>'; print_r($ecole) ; echo'</pre>';

$ecole1 = new Ecole;
echo '<pre>'; var_dump($ecole1) ; echo'</pre>';

$ecole2 = $ecole;
echo '<pre>'; var_dump($ecole2) ; echo'</pre>';

$ecole2->cp = 91;
// lorsque je modifie $ecole, cela prend effet sur $ecole2 et inversement. $ecole et $ecole2 ont des reférences qui pointent vers le même objet #1. Ils représentent le même objet
echo "Ecole > " . $ecole->cp . '<hr>';
echo "Ecole2 > " . $ecole2->cp . '<hr>';

$ecole3 = clone $ecole1;
echo '<pre>'; var_dump($ecole3) ; echo'</pre>';
echo '<pre>'; var_dump($ecole1) ; echo'</pre>';

echo "Ecole1 > " . $ecole1->cp . '<hr>';
echo "Ecole3 > " . $ecole3->cp . '<hr>';

// __clone s' execute lorsqu' on 'clone' un objet. Cela crée un nouvel objet avec une nouvelle référence (#)
//  si nous avions deux class quasi identiques, nous privilégierons le clonage pour y apporter une modification du comportement de la class
?>