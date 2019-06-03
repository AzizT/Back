<?php
class User{
    private $pseudo;
    private $prenom;
    private $email;
    protected $password;
    private $date_naissance;

    public function getPrenom(){
        return $this -> prenom;
    }

    public function setPrenom($prenom)
    {
        if(!empty($_POST['prenom']))
{
    if(strlen($_POST['prenom']) >= 3 && strlen($_POST['prenom']) <= 20)
    {
       $user -> prenom = $prenom;
    }
}
    }
}

class Admin extends User
{
    public function setPassword($password)
    {
        $this -> password = $password;
    }
}

$user = new User;


 $user -> setPrenom($_POST['prenom']);
echo 'Prenom : ' . $user -> prenom;
?>