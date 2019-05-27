<?php
abstract class Vehicule
{
    public function demarrer(){
        return "je demarre <hr>";
    }
    abstract public function carburant();

    public function nombreTestObligatoire()
    {
        return 100;
    }
}
// *********************************************
class Peugeot extends Vehicule
{
    public function carburant(){
        return "essence <hr>";
    }
    public function nombreTestObligatoire()
    {
        $resultat = parent::nombreTestObligatoire();
        return $resultat + 70;
    }
}
// *********************************************
class Renault extends Vehicule
{
    public function carburant()
    {
        return 'diesel <hr>';
    }
    public function nombreTestObligatoire()
    {
        $resultat = parent::nombreTestObligatoire();
        return $resultat + 30;
    }
}

/*
1 faire en sorte de ne pas avoir d' objet véhicule
2 obligation pour Renault et Peugeot de posseder la même methode demarrer
3 Obligation pour la Renault de declarer un carburant diesel et pour la Peugeot essence
4 La Renault doit faire 30 tests de + qu' un véhicule de base
4 La Peugeot doit faire 70 tests de + qu' un véhicule de base
5 affichage habituel
*/

$peugeot1 = new Peugeot;
echo "Je suis une Peugeot et " . $peugeot1->demarrer();
echo "Je suis une Peugeot et je consomme de l' " . $peugeot1->carburant();
echo "Je suis une Peugeot et je dois effectuer " . $peugeot1->nombreTestObligatoire() . " tests obligatoires de plus qu' un véhicule de base <hr>";

$renault1 = new Renault;
echo "Je suis une Renault et " . $renault1->demarrer();
echo "Je suis une Renault et je consomme du " . $renault1->carburant();
echo "Je suis une Renault et je dois effectuer " . $renault1->nombreTestObligatoire() . " tests obligatoires de plus qu' un véhicule de base <hr>";
?>