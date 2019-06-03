<?php
namespace Model;

class EntityRepository
{
   private $db;
   public $table;
   public function getDb() // méthode permettant d'instancier la classe PDO et de créer un objet PDO
   {
        if(!$this->db) // seulement si $this->db n'est pas rempli, si il n'y a pas de connexion BDD, alors on la construit
        {
            try
            {
                $xml = simplexml_load_file('app/config.xml');

                $this->table = $xml->table; // on associe de la table du fichier XML à la propriété '$table' de la classe, cette propriété nous servira pour toute nos requetes SQL (INSERT INTO $this->table)  

                try
                {
                    $this->db = new \PDO("mysql:dbname=" . $xml->db . ";host=" . $xml->host, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)); // connexion à la BDD, si jamais on chage de BDD, nous n'aurons pas besoin de modifier ce code, c'est un code généric, c'est le fichier config.xml que l'on mofifiera
                }
                catch(\PDOException $e) // on entre dans le 'catch' en cas de mauvaise connexion
                {
                    die("Problème de connexion BDD !!");
                }
            }
            catch(\PDOException $e)
            {
                die("Problème de fichier XML manquant !!");
            }
        }
        return $this->db; // on retourne la connexion
   }
   
   public function selectAll() // méthode permettant de selectionner tout les conducteurs
   {
       // $q = $bdd->query("SELECT * FROM employe");
       // $this->getDb() : représente un objet PDO donc une connexion à la BDD
       $q = $this->getDb()->query("SELECT * FROM " . $this->table);
       // $this->table : représente dans notre cas la table 'employe', c'est ce que l'on a recupéré du fichier config.xml
       $r = $q->fetchAll(\PDO::FETCH_ASSOC);
       return $r;
   }

   public function getFields()
   {
       $q = $this->getDb()->query("DESC " . $this->table); // DESC : description de la table
       $r = $q->fetchAll(\PDO::FETCH_ASSOC);
       return array_splice($r, 1); // permet de retirer le premier champs idEmploye dans le formulaire grace à la méthode array_splice()
   }

   public function select($id)
   {
       $q = $this->getDb()->query("SELECT * FROM " . $this->table . ' WHERE id' .ucfirst($this->table) . "=" . (int) $id);
    //    $this->table : employe
    //  id' .ucfirst($this->table) : idEmploye
       $r = $q->fetch(\PDO::FETCH_ASSOC);
       return $r;
   }

   public function save()
   {
       $id = isset($_GET['id'])? $_GET['id'] : 'NULL';
       $id = $this->getDb()->query('REPLACE INTO ' . $this->table . '(id' . ucfirst($this->table) . ',' . implode(',', array_keys($_POST)) . ')VALUES(' . $id . ',' . "'" . implode("','", $_POST) . "'" . ')');
       // $this->table : retourne la table 'employe'
       // id . ucfirst($this->table) : idEmploye
       // implode(',', array_keys($_POST)) : permet d'extraire chaque indice du formulaire afin de les appeler comme nom de champs, colonne dans la requete
   }

   public function delete($id)
   {
       $q = $this->getDb()->query("DELETE FROM " . $this->table . " WHERE id" . ucfirst($this->table) . '=' . (int) $id);
       
   }
}

$e = new EntityRepository;
$e->getDb();
