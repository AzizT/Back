<!-- Exercice 1 : PHPOO

- Créer une classe Etudiant

- Créer les propriétés private

- prenom (string de 5 à 30 caracteres)

- nom (string de 5 à 30)

- email(email)

- telephone (INT de 10 caracteres)



- Créer une fonction getInfos() qui retourne un array avec toutes les infos

- Instancier 3 fois la classe dans un autre fichier. Pour chaque etudiant affecter des valeurs et les afficher.



Exercice 2 : AJAX

- Créer une page HTML avec un bouton afficher (ce bouton ne recharge pas la page)

- En ajax (JS + PHP), au click sur le bouton, récupérer et afficher sous la forme d'un tableau HTML les infos des produits de la boutique (BDD : site_commerce)



- si tout est terminé, ajouter un formulaire pour ajouter un produit (en AJAX) -->

<!-- exo 1 -->

<?php
class Etudiant
{
    private $prenom;
    private $nom;
    private $mail;
    private $phone;

    // ************************************
    public function setPrenom($prenom)
    {
        if (isset($prenom) || strlen($prenom) < 5 || strlen($prenom) > 30) {
            $this->prenom = $prenom;
            return $this;
        } else {
            $this->error = "Le prenom doit comporter entre 5 et 30 caracteres";
            return $this->error;
        }
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    // ***********************************
    // ************************************
    public function setNom($nom)
    {
        if (isset($nom) || strlen($nom) < 5 || strlen($nom) > 30) {
            $this->nom = $nom;
        } else {
            $this->error = "Le nom doit comporter entre 5 et 30 caracteres";
            return $this->error;
        }
    }
    public function getNom()
    {
        return $this->nom;
    }
    // ***********************************
    // ************************************
    public function setMail($mail)
    {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $this->mail = $mail;
        } else {
            $this->error = "ce n' est pas le bon format";
            return $this->error;
        }
    }
    public function getMail()
    {
        return $this->mail;
    }
    // ***********************************
    // ************************************
    public function setPhone($phone)
    {
        if (is_numeric($phone) || iconv_strlen($phone) !== 10) {
            $this->phone = $phone;
        } else {
            $this->error = "ce n' est pas le bon format";
            return $this->error;
        }
    }
    public function getPhone()
    {
        return $this->phone;
    }
    // ***********************************
    // public function getInfos()
    // {

    // }
}

$etudiant = new Etudiant;
echo '<pre>';
var_dump($etudiant);
echo '</pre>';

$etudiant1 = new Etudiant;

$etudiant1->setPrenom("Aziz");
echo "Mon prenom est : " . $etudiant1->getPrenom() . '<hr>';
$etudiant1->setNom("Tobbal");
echo "Mon nom est : " . $etudiant1->getNom() . '<hr>';
$etudiant1->setMail("aziz.tobbal@lepoles.com");
echo "Mon mail est : " . $etudiant1->getMail() . '<hr>';
$etudiant1->setPhone("0123654789");
echo "Mon téléphone est : " . $etudiant1->getPhone() . '<hr><br>';


$etudiant2 = new Etudiant;




$etudiant2->setPrenom('Nassim');

echo "Mon Prénom est : " . $etudiant2->getPrenom() . '<hr>';



$etudiant2->setNom('AMARA');

echo "Mon nom est : " . $etudiant2->getNom() . '<hr>';



$etudiant2->setMail('nassim.amara@lepoles.com');

echo "Mon Mail est : " . $etudiant2->getMail() . '<hr>';



$etudiant2->setPhone('0615919616');

echo "Mon Teléphone est : " . $etudiant2->getPhone() . '<hr><br>';



$etudiant3 = new Etudiant;

$etudiant3->setPrenom("Djamila");
echo "Mon prenom est : " . $etudiant3->getPrenom() . '<hr>';
$etudiant3->setNom("Chabane");
echo "Mon nom est : " . $etudiant3->getNom() . '<hr>';
$etudiant3->setMail("djamila.chabane@lepoles.com");
echo "Mon mail est : " . $etudiant3->getMail() . '<hr>';
$etudiant3->setPhone("0987456321");
echo "Mon téléphone est : " . $etudiant3->getPhone() . '<hr><br>';

$etudiant4 = new Etudiant;

$etudiant4->setPrenom("Auguste");
echo "Mon prenom est : " . $etudiant4->getPrenom() . '<hr>';
$etudiant4->setNom("Simeon Ba");
echo "Mon nom est : " . $etudiant4->getNom() . '<hr>';
$etudiant4->setMail("auguste.ba@lepoles.com");
echo "Mon mail est : " . $etudiant4->getMail() . '<hr>';
$etudiant4->setPhone("9874563210");
echo "Mon téléphone est : " . $etudiant4->getPhone() . '<hr><br>';
?>