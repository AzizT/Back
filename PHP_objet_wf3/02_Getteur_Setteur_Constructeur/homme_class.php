<?php
class Homme
{
    private $error;
    private $prenom;
    private $nom;
    public function setPrenom($prenom)
    {
        if(is_string($prenom))
        {
            $this->prenom = $prenom;
        }
        else
        {
            $this->error = "ce n' est pas un string !";
            return $this->error;
        }
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setNom($nom)
    {
        if ((strlen($nom) > 2) && (strlen($nom) < 21)) {
            $this->nom = $nom;
        } else {
            $this->error = "La longueur du nom n' est pas correct !";
            return $this->error;
        }
    }
    public function getNom()
    // un Get ne reçoit jamais d' arguments (entre les parentheses), et par convention, on place toujours Set et Get devant le nom des methodes
    {
        return $this->nom;
    }
}
$homme = new Homme;
    echo '<pre>'; var_dump($homme); echo '</pre>';

// $homme->prenom = 'Aziz';
// va générer une erreur car il n' est pas possible d' acceder et d' affecter une valeur a une propriété privée. On ne peut pas entrer n' importe quoi dans les propriétés

$homme->setPrenom("Aziz");
echo "Mon prenom est : " . $homme->getPrenom() . '<hr>';

echo $homme->setPrenom(28) . '<hr>';
// la ligne ci dessus génére une erreur car ce n' est pas un string, mais un integer (on tombe dans le cas de figure du else du setteur)

/*
Un setteur permet de controler les données, par exemple les données saisies dans un formulaire

Un Getteur permet de voir les données finales, c' est a dire les données qui ont été controlées. Par exemple on peut se servir des méthodes Getteur pour enregistrer des données dans les bdd
*/

// exo: realiser le setteur et le getteur pour la propriété nom en controlant dans le setteur que le nom soit compris entre 2 et 20 caracteres
$homme->setNom("Tobbal");
echo "Mon nom est : " . $homme->getNom() . '<hr>';

echo $homme->setNom("a");
?>