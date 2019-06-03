<?php
// auguste doit gerer l' interface et donne le moule, le contrat a aurelia et iuliia
// tronc commun pour les points convergents, le reste sera independant
interface Mouvement
{
    public function start();
    public function turnRight();
    public function turhLeft();
}
// partie de code pour aurelia
class Avion extends Vehicule implements Mouvement
{
    public function start();
    public function turnRight();
    public function turhLeft();
}
// partie de code pour iuliia
class Bateau extends Vehicule implements Mouvement
{
    public function start();
    public function turnRight();
    public function turhLeft();
}
?>