<?php
function inclusionAutomatique($nomDeLaClasse)
{
    echo $nomDeLaClasse . '<hr>';
    require_once( $nomDeLaClasse.  '_class.php');
    echo "on passe dans inclusionAutomatique() <hr>";
    echo "require_once($nomDeLaClasse. '_class.php') <hr>";
}
spl_autoload_register( 'inclusionAutomatique');
$a = new A;
/*

    - spl_autoload_register() est une fonction prédéfinie qui s'execute automatiquement lorsque l'interpreteur voit passer le mot clé 'new';donc lorsque l'on instancie une classe.

    - En plus,nous demandons à  spl_autoload_register() d'éxecuter notre fonction inclusionAutomatique()

    - spl_autoload_register() recupère tout ce qu'il y a après le 'new' et l'envoi en argument de la fonction inclusionAutomatique(), c'est ce qui permet de faire au bon fichier dans lequel la classe est déclarée.

 */
?>