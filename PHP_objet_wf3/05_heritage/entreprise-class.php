<?php
class Electricien
{
    public function getSpecialiste()
    {
        return "pose de cables, tableaux et armoires electriques ...<hr>";
    }
    public function getHoraires()
    {
        return "10h / 18h <hr>";
    }
}
// *********************************************************************
class Plombier
{
    public function getSpecialiste()
    {
        return "Tuyaux, robinets, chauffe-eau, compteurs ...<hr>";
    }
    public function getHoraires()
    {
        return "9h / 19h <hr>";
    }
}
// *********************************************************************
class Entreprise
{
    public $numero = 0;
    public function appelUnEmploye($employe)
    {
        $this->numero++;
        // $entreprise->monEmploye1 = new Plombier
        // $entreprise->monEmploye2 = new Electricien

        $this->{"monEmploye" . $this->numero} = new $employe;
        // a chaque fois que l' on execute la methode appelUnEmploye, cela genere dans le même temps unepropriété dans laquelle est stockée une instance de classe

        return $this->{"monEmploye" . $this->numero};
        // on retourne l' objet généré
        // return $entreprise->monEmploye1
        // return $entreprise->monEmploye2
    }
}

$entreprise = new Entreprise;
$entreprise->appelUnEmploye('Plombier');

// exo: afficher les methodes de la classe plombier via la classe entreprise
echo $entreprise->monEmploye1->getSpecialiste();
echo $entreprise->monEmploye1->getHoraires();

$entreprise->appelUnEmploye('Electricien');
echo $entreprise->monEmploye2->getSpecialiste() ;
echo $entreprise->monEmploye2->getHoraires() ;


?>