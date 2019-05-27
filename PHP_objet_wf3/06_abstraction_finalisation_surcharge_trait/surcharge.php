<?php
class A
{
    public function calcul()
    {
        return 10;
    }
}
// *****************************************************

class B extends A{
    public function calcul()
    // redefinition
    {
        $nb = parent::calcul();
        // parent fonctionne pour appeler une methode d' une classe parente lors d' une surcharge (over-ride)
        //  Une surcharge permet de prendre en compte le comportement de ma fonction d' origine et d' y ajouter un comportement supplémentaire
        if($nb <= 100) return "$nb est inferieur a 100 <hr>";
        else           return "$nb est superieur a 100";
    }
}
// pour la surcharge, si onne faisiat pas ça dans WordPress, on ne pourraitpas mettre a jour les CMS. On modifierait directement les fonctions du coeur

// exo: instancier le classe B et afficher le resultat de la condition
$b = new B;
echo $b->calcul();
?>
