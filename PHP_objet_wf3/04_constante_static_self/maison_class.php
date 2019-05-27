<?php 
class Maison
{
    private static $nbPiece = 7;
    // propriété qui appartient a la class (static)
    public static $espaceTerrain = '500m';
    // appartient a la class
    public $couleur = 'blanc';
    // appartient a l' objet
    const HAUTEUR = '10m';
    // appartient ala classe du fait que ce soit une constante
    private $nbPorte = 10;

    public static function getNbPiece()
    {
        return self::$nbPiece;
        //  Ici, self permet de faire appel a une propriété  static declarée a l' intérieur de la classe
    }
    public static function getEspaceTerrain()
    {
        return self::$espaceTerrain;
    }
    public static function getHauteur()
    {
        return self::HAUTEUR;
    }
    public function getNbPorte()
    {
        return $this->nbPorte;
    }
}

// 1- afficher le nombre de pieces de la maison
echo "nombre de pieces de la maison : <strong>". Maison::getNbPiece() . "</strong>" . "<hr>";
// Lorsqu' une methode est static, cela veut dire qu' elle appartient a la class et non a l' objet.

// 2- afficher l' espace terrain de la maison
echo "Espace terrain : <strong>" . Maison::getEspaceTerrain() . "</strong>" . "<hr>";
// 3- afficher la hauteur de la maison
echo "Hauteur maison : <strong>" . Maison::getHauteur() . "</strong>" . "<hr>";
// 4- afficher la couleur de la maison
$maison = new Maison;
echo "Couleur maison : <strong>" . $maison->couleur . "</strong>" . "<hr>";
// 5- afficher le nombre de portes de la maison
echo "Nombre de portes de la maison : <strong>" . $maison->getNbPorte() . "</strong>" . "<hr>";
echo $maison::$espaceTerrain . "<hr>";
// normalement aurait du générer une erreur dans le rendu, mais ça n' est pas le cas
// car on ne doit pas appeler une propriété static, donc qui appartient a une class, via un objet
// celle du dessous, quasi similaire, en revanche ne fonctionne pas ( et ne doit pas non plus focntionner)
// echo $maison->$espaceTerrain . "<hr>";

echo $maison->getNbPiece() . "<hr>";
// celle ci fonctionne, mais n' aurait pas du non plus. La bonne ecriture aurait du etre: Maison::getNbPiece()

// echo Maison::$couleur;
//  Erreur car on ne doit pas appeler une propriété public par la classe
?>