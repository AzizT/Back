<?php
class Vehicule
{
    private static $marque = 'BMW';
    private $couleur = 'noir';
    public static function setMarque($marque)
    {
        return self::$marque = $marque;
    }
    public static function getMarque()
    {
        return self::$marque;
    }
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }
}

// exo: créer un objet issu de la class véhicule et faire une phrase qui affiche la marque et la couleur

$vehicule = new Vehicule;
echo "Ce véhicule est une <strong>" . Vehicule::getMarque() . "</strong> de couleur " . $vehicule->getCouleur() . "<hr>";

// exo: créer un autre véhicule et changer la couleur par violet
$vehicule1 = new Vehicule;
$vehicule1->setCouleur('violet');
echo "Cet autre véhicule est une <strong>" . Vehicule::getMarque() . "</strong> de couleur " . $vehicule1->getCouleur() . "<hr>";

// exo: créer un véhicule 3
$vehicule2 = new Vehicule;
echo "Ce troisieme véhicule est une <strong>" . Vehicule::getMarque() . "</strong> de couleur " . $vehicule2->getCouleur() . "<hr>";
// la couleur noir n' est pas ecrasée par violet. On retrouve noir ici

// exo: modifier la marque par mercedes
Vehicule::setMarque('Mercedes');
// il faut appeler la classe et non l' objet
// et désormais tous les prochains véhicules seront des mercedes
$vehicule3 = new Vehicule;
echo "Ce véhicule est une <strong>" . Vehicule::getMarque() . "</strong> de couleur " . $vehicule3->getCouleur() . "<hr>";

/*
un élément declaré comme static appartient a la classe et non a l' objet
Si je modifie un élément static, je modifie la classe en elle même
$objet->élément d' objet a l' extérieur de la classe
class::élément de la class a l' exterieur de la classe
self::élément de la classe a l' interieur de la classe
*/


?>