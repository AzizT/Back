<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 * 
 * @ORM\Table(name="Produit")
 * //correspond a la table produit dans la bdd
 * 
 * @ORM\Entity()
 * //signifie que cette classe est une entité
 * 
 */

class Produit
{
    /**
     * 
     * @ORM\Column(name="id_produit", type="integer", length=5,nullable=false)
     * //les normes, tel que Integer
     * @ORM\id
     * //clé primaire
     * @ORM\GeneratedValue(strategy="AUTO")
     * // auto-incrémentation
     */
    private $id;

    /**
     * 
     * @ORM\Column(name="reference", type="string", length=20, nullable=false)
     */
    private $reference;

    /**
     * 
     * @ORM\Column(name="categorie", type="string", length=20, nullable=false)
     */
    private $categorie;
    /**
     * 
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $titre;
    /**
     * 
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;
    /**
     * 
     * @ORM\Column(name="couleur", type="string", length=20, nullable=false)
     */
    private $couleur;
    /**
     * 
     * @ORM\Column(name="taille", type="string", length=5, nullable=false)
     */
    private $taille;
    /**
     * 
     * @ORM\Column(name="public", type="string", length=5, nullable=false)
     */
    private $public;
    /**
     * 
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;
    /**
     * 
     * @ORM\Column(name="prix", type="float", length=5,nullable=false)
     */
    private $prix;
    /**
     * 
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;



    public function getId()
    {
        return $this->id;
    }


    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }


    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    public function getPublic()
    {
        return $this->public;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }
}
