<?php
class Societe
{
    public $adresse;
    public $ville;
    public $cp;

    public function __set($nom, $valeur)
                    //   $ville, $Paris
    {
        echo "La propriété <strong>$nom</strong> n' a pas été declarée, la valeur <strong>$valeur</strong> n' a donc pas été affectée";
    }

    public function __get($nom)
    //                    $titre
    {
        echo "La propriété <strong>$nom</strong> n' a pas été declarée, on ne peut donc pas l' afficher";
    }

    public function __call($nom, $argument)
    //                     uygfuy (1-test-1), tableau array qui receptionne les arugments
    {
        echo "La methode <strong>$nom</strong> n' a pas été declarée, les arguments étaient <strong>" . implode("-", $argument) . "</strong>";
    }
}
$societe = new Societe;
$societe->villes= "Paris";
// tentative d' affectation d' une propriété qui n' a pas été mal declarée
echo '<pre>'; print_r($societe); echo '</pre>';
// n' aurait pas du fonctionner car ville =/ villes, mais fonctionne quand même. Pour parer a cette permissivité, on va utiliser une methode magique => __set(), qui reçoit deux arguments

// __set est une méthode magique qui ne se declenche uniquement en cas de tentative d' affectation sur une propriété qui n' existe pas

echo $societe->titre;
// tentative d' affectation d' une propriété qui n' a pas été declarée du tout...ne va pas fonctionner, mais on va lui adjoindre la methode magique __get pour afficher un message plus adequat
// __get va se declencher au cas ou on tente d' afficher une propriété non declarée

echo $societe->uygfuy(1, 'test', true);
// tentative d' affectation d' une methode qui n' a pas été declarée. On va utiliser la methode __call
// __call s' execute automatiquement lorsqu' une methode n'a pas été declarée

/*
Avec les methodes magiques, on peut en php afficher divers messages "propres" pour couvrir des erreurs "sales"
*/
?>