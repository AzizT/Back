<?php
abstract class Joueur  
{
    public function seConnecter()
    {
        return $this->EtreMajeur();
    }
    abstract public function EtreMajeur();
    abstract public function Devise();
}
// $test = new Joueur;
// génère une erreur car une class abstraite n' est pas instanciable

class JoueurFr extends Joueur
{
    public function EtreMajeur()
    {
        return 18;
    }
    public function Devise()
    {
        return '€';
    }
}
// *********************************************************************************************
class JoueurUS extends Joueur
{
    public function EtreMajeur()
    {
        return 21;
    }
    public function Devise()
    {
        return '$';
    }
}

// *********************************************

// exo: créer un objet joueurFr et afficher les méthodes contenues dans la classe + créer class joueurUs

$joueur1 = new JoueurFr;
echo "Un joueur français doit avoir minimum " .$joueur1->EtreMajeur(). " ans et devra utiliser des " . $joueur1->Devise() .'<hr>';

$joueur2 = new JoueurUs;
echo "Un joueur americain doit avoir minimum " . $joueur2->EtreMajeur() . " ans et devra utiliser des " . $joueur2->Devise() . '<hr>';

// une class abstraite n' est pas instanciable. Ses methodes abstraites n' ontpas de contenu. Et lorsqu' on hérite des methodes abstraites, il faut les redéfinir, c' est obligatoire. Pour ce faire, il est necessaire que la classe qui les contienne soit abstraite.

// le developpeur qui ecrit la classe joueur est au coeur de l' application (noyau) et va obliger les autres developpeurs a redefinir les methodes EtreMajeur() et Devise(). C' est une bonne methodologie de travail. On impose de bonnes contraintes
?>
