<?php 
class Etudiant
{
    private $prenom;
    private $error;
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
    
    public function __construct($arg)
    // methode contruct avec deux __ underscores
    // c' est une methode magique qu s' execute automatiquement lorsqu' on instancie la classe
    //  elle est l' équivalent du init.php, avec une session start, connexion bdd, autoload etc...
    {
        echo "instanciation, nous avons reçu l' information suivante : $arg <br>";
        return $this->setPrenom($arg);
        return $this->setNom($arg);
    }
}
$etudiant = new Etudiant('Aziz');
echo '<pre>'; var_dump($etudiant); echo'</pre>';
echo "Mon nom est : " . $etudiant->getPrenom() . '<hr>';

echo $etudiant->setPrenom(28);
$etudiant->__construct('Aziz');

// a l' instanciation de la classe, aziz va automatiquement se stocker en argument de la methode magique __construct()
?>