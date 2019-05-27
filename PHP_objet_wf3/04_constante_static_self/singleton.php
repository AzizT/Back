<?php
class Singleton
{
    public $numero = 20;
    private static $instance = null;
    private function __construct(){}
        // cette classe n' est pas instanciable car le constructeur est privé
    private function __clone(){}
        // l' objet ne sera pas clonable
    public function getInstance()
    {
        if(is_null(self::$instance))
        // si $instance est null, la première fois c' est null. Les fois suivantes je ne rentrerais plus ici car il y aura désormais un objet dans $instance
        {
            self::$instance = new Singleton;
            // on stocke l' objet dans la class singleton
        }
        return self::$instance;
        // dans tous les cas je retourne un objet $instance
    }
}

// $s = new Singleton;
// génère une erreur car on ne peut instacier cete classe, puisque le constructeur est privé. On va donc créer une methode appelée getInstance

$objet1 = Singleton::getInstance();
// $objet1 possede la férérence #1
echo '<pre>'; var_dump($objet1); echo'</pre>';

$objet2 = Singleton::getInstance();
// $objet2 aussi a la référence #1, il s' agit bien du même objet
echo '<pre>'; var_dump($objet2); echo'</pre>';

echo $objet1->numero . '<hr>';
echo $objet2->numero . '<hr>';
$objet2->numero = 22;
echo $objet1->numero . '<hr>';
echo $objet2->numero . '<hr>';
// le singleton fait que même si la variable a un nom différent, la valeur reste la même ( ici 22, même si les deux variables semblent différentes)
// un pattern singleton permet de trouver une solution simple a un probleme recurent
?>