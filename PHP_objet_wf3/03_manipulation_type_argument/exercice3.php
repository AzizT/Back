<?php
class Vehicule
{
    private $litresEssence;

    public function setLitresEssence($litres){
        $this->litresEssence = $litres;
    }
    public function getLitresEssence(){
        return $this->litresEssence;
    }
}

class Pompe
{
    private $litresEssence;

    public function setLitresEssence($litres){
        $this->litresEssence = $litres;
    }
    public function getLitresEssence(){
        return $this->litresEssence;
    }
    public function donnerEssence(Vehicule $v){
        // on exige un argument de type véhicule (un objet issu de la class véhicule)
        echo '<pre>'; var_dump($v); echo '</pre>';
        $this->setLitresEssence($this->getLitresEssence() - (50 - $v->getLitresEssence()));
        // $pompe->setLitresEssence(          800         -  50 -  5 (ce que contenait déjà le véhicule))
        // on définit le nombre de 'litre d' essence dans la pompe
        $v->setLitresEssence($v->getLitresEssence() + (50 - $v->getLitresEssence()));
        //                            5             +  50 - 5
        // on définit le nombre de 'litre d' essence dans le véhicule
    }
}

$vehicule = new Vehicule;

$vehicule-> setLitresEssence("5");
echo "Dans le réservoir du véhicule il y a : " . $vehicule-> getLitresEssence() . " litres d' essence." . '<hr>';

$pompe = new Pompe;

$vehicule-> setLitresEssence("800");
echo "Dans le réservoir de la pompe il y a : " . $vehicule-> getLitresEssence() . " litres d' essence." . '<hr>';

$pompe->donnerEssence($vehicule);
echo "Nombre de litres d' essence pour la pompe : " . $pompe->getLitresEssence() . '<hr>';
echo "Nombre de litres d' essence pour le véhicule : " . $vehicule->getLitresEssence()  . '<hr>';
?>