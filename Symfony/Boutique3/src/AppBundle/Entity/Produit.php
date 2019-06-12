<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=20, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=20, nullable=false)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=20, nullable=false)
     */
    private $couleur;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=5, nullable=false)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="public", type="string", length=5, nullable=false)
     */
    private $public;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo = 'default.png';

    // on ne mappe pas cette propriété car elle n' est pas liée a la bdd, elle va simplement nous permettre de manipuler les photos d' un produit afin de l' enregistrer
    private $file;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Produit
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Produit
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Produit
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set taille
     *
     * @param string $taille
     *
     * @return Produit
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set public
     *
     * @param string $public
     *
     * @return Produit
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return string
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Produit
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Produit
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    
    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set File
     * 
     * @param object UploadedFile
     * 
     * @return object
     */
    public function setFile(UploadedFile $file = NULL)
    // l' objet uploadedFile() de SF nous permet de gérer tout ce qui est lié a un fichier uploadé ($_FILE => nom, taille, type, code erreur, emplacement temporaire)
    {
        $this ->file = $file;
        return $this;
    }

    /**
     * Get File
     *
     * 
     * @return object UploadedFile
     */
    public function getFile()
    {
        return $this ->file;
    }

    public function uploadPhoto(){
        // s' il n y a pas de fichier chargé dans l' objet alors on sort de la fonction
        if(!$this ->file){
            return;
        }
        // on va récupérer le nom original de la photo pour le renommer
        $name = $this -> renameFile($this->file -> getClientOriginalName());
        // $name = renameFile('***.jpg')

        $this ->photo = $name;
        // on enregistre en bdd le nouveau nom

        $this ->file -> move($this -> photoDir(), $name);
        // on deplace cette "nouvelle" photo dans son dossier définitif (fonction photoDir ci dessous)
    }

    public function renameFile($nom){
        return 'file ' . time() . ' ' . rand(1, 9999) . $nom;
        // pour une photo nommée avatar on va lui concaténer le mot file + timestamp + un nombre aléatoire entre 1 et 9999 + le nom d' origine
    }

    public function photoDir(){
        return __DIR__ . '/../../../web/photo';
        // on lui indique le chemin pour la nouvelle photo
    }

    public function removePhoto(){
        if(file_exists($this -> photoDir() . '/' . $this ->photo) && $this ->photo != 'default.png')
        {
            unlink( $this->photoDir() . '/' . $this->photo);
        }
    }
}
