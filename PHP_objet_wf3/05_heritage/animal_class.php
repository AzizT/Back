<?php
class Animal
{
    protected function deplacement()
    {
        return "je me deplace";
    }
    public function manger()
    {
        return "je mange chaque jour";
    }
}
// ************************************************************************************************************************************
class Elephant extends Animal
{
    public function quiSuisJe()
    {
        return "Je suis un éléphant et " . $this->deplacement() . '<hr>';
    }
}
// *******************************************************************************************************************************
class Chat extends Animal
{
    public function quiSuisJe()
    {
        return "Je suis un chat";
    }
    public function manger(){
        return "Je me goinfre comme un gros chat !";
    }
}
$elephant = new Elephant;
echo '<pre>'; print_r(get_class_methods($elephant)); echo '</pre>';
echo $elephant->quiSuisJe();

// exo: créer un objet issu de la classe chat et afficher le résultat des 2 méthodes declarées a l' interieur
$chat = new Chat;
echo $chat->quiSuisJe() .'<hr>';
echo $chat->manger() . '<hr>';
// la conclusion est que le pointeur va d' abord chercher dans la class chat pour l' affichage de manger, et s' il ne trouve rien, il remonte a animal ou la même fonction existe
?>