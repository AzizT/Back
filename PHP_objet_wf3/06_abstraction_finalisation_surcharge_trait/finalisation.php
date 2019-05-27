<?php
final class Application
{
    public function lancementApplication()
    {
        return "L' appli se lance comme cela ! <hr>";
    }
} 
// **************************************************************

class Application2
{
    final public function lancementApplication()
    {
        return "L' appli se lance comme cela ! <hr>";
    }
}
// **************************************************************

class Extention extends Application2
{
    // public function lancementApplication()
    // {
    //     return "L' appli se lance comme cela ! <hr>";
    // }
    // le code ci dessus va générer une erreur car en cas d' héritage, on ne peut redeclarer, réecrire une methode final
    // elle est verrouillée, on ne peut l' améliorer, la surcharger
}

// final permet de verrouiller une class ou une methode, c' est une methodologie de travail
$app = new Application;
// une class final est bien instanciable
// par contre, il n' est pas possible d' hériter d' une class final
echo '<pre>'; var_dump($app); echo'</pre>';                        
echo $app->lancementApplication();

$ext = new Extention;
echo $ext->lancementApplication();

// l' interet de mettre une boucle final sur une methode est de verrouiller afin d' empecher toute sous classe de la redefinir (quand nous voulons que le comportement d' une methode soit preservé durant l' héritage)
?>