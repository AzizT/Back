<?php
class Etudiant
{
    private $prenom;
    private $nom;
    private $email;
    private $telephone;

    public function setPrenom($prenom)
    {
        if(iconv_strlen($prenom) < 2 || iconv_strlen($prenom) > 30)
        {
            echo '<p>Le prenom doit contenir entre 2 et 30 caracteres</p>';
        }
        else{
            $this->prenom = $prenom;
            return $this;
        }
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setNom($nom)
    {
        if (iconv_strlen($nom) < 2 || iconv_strlen($nom) > 30) {
            echo '<p>Le prenom doit contenir entre 2 et 30 caracteres</p>';
        } else {
            $this->nom = $nom;
            return $this;
        }
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo '<p>Saisissez un mail valide</p>';
        } else {
            $this->email = $email;
            return $this;
        }
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setTelephone($telephone)
    {
        if(!preg_match('#^[0-9]{10}+$#', $telephone))
        {
            echo '<p>Saisissez un numero valide</p>';
        }
        else{
            $this->telephone = $telephone;
            return $this;
        }
    }
    public function getTelephone()
    {
        return $this->telephone;
    }

    // fonction getInfo

    public function getInfos()
    {
        $info['prenom'] = $this->getPrenom();
        $info['nom'] = $this->getNom();
        $info['email'] = $this->getEmail();
        $info['telephone'] = $this->getTelephone();

        return $info;
    }
}
?>