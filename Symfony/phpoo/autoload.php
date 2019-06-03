<?php
class Autoload
{
    public static function chargement($class)
        {
            require('Controller/' . $class . '.php');
        }
}
spl_autoload_register(array('Autoload', 'chargement'));
// va s' executer a chaque fois qu' il verra apparaitre le mot 'New'
// va apporter en argument de notre fonction ce qui suit le New

/*
$a = new Autoload;
$a -> chargement();

Autoload::chargement('User');

new Controller\User;
require('user.php');
*/


?>