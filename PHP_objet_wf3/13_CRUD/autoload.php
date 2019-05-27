<?php 
class Autoload
{                                // Controller\Controller  
    public static function className($className)
    {                                       
        require __DIR__ . '/' . str_replace('\\', '/', $className . '.php');
        // str_replace() permet de remplacer les anti-slash '\', nous avons deux anti-slash sinon l'interpréteur considère que c'est un caractère d'échappememt
        //echo "require  " . __DIR__ . '/' . str_replace('\\', '/', $className . '.php');
    }
}

spl_autoload_register(array('Autoload', 'className')); // s'execute lorsque l'interpreteur voit passer le mot clé 'new' et la fonction 'className()' est executée dans la même temps
// Controller\Controller : envoyé en argument de la méthode 'className'

 // $a = new Controller\Controller; // au moment de l'instanciation, l'autoload s'execute et va chercher dans le dossier 'Controller' le fichier 'controller.php', d'où l'importnace du nommage des dossiers et des fichiers 
// le namespace doit avoir le même nom que le dossier

// Exo : faire le même affichage avec la ligne suivante : 
//$b = new Model\EntityRepository;


