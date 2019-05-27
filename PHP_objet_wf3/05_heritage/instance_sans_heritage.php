<?php
class A
{
    public function direBonjour(){
        return "Bonjour";
    }
}
// **********************************************************
class B
// sans héritage de la class A
{
    public $objetA;
    public function __construct(){
        // __construct() s' execute automatiquement lorsqu' on instancie B
        $this->objetA = new A;
        // je crée un objet issu de la classe A que je stocke dans la propriété nommée $objetA
        echo "S' execute automatiquement et détaille : ";
        echo '<pre>'; var_dump($this->objetA); echo '</pre>';
    }
    public function uneMethode()
    {
        return $this->objetA->direBonjour();
        // dans mon objet B '$b'($this), je peux appeler des méthodes sur mon objet A '$objetA'

        // Habituellement nous mettons qu'une seule flèche, mais là; $objetA contient un objet une autre flèche est donc possible
    }
}
$b = new B;
echo $b->uneMethode() . '<hr>';
echo $b->objetA->direBonjour() . '<hr>';
?>