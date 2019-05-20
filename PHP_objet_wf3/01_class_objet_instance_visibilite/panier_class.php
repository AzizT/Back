<?php
// par convention, le nom d' une classe commence par une majuscule
    class Panier
    {
        public $nbProduits;
        // on peut declarer une variable, propriété vide (en orienté objet)
        public function ajouterArticle()
        {
            return "L' article a été ajouté !";
        }
        protected function retireArticle()
        {
            return "L' article a été retiré !";
        }
        private function affichageArticle()
        {
            return "Voici les articles !";
        }
    }

    $panier1 = new Panier;
    echo '<pre>'; var_dump($panier1); echo '</pre>';
    // on observe un objet de la class panier, avec l' identifiant '#1' (référence de l' objet). Il peut y avoir plusieurs objets conservés en RAM. Ils auront tous un identifiant différent
    echo '<pre>'; var_dump(get_class_methods($panier1)); echo '</pre>';

    // exo: affecter la valeur de 5 a la propriété $nbProduits
    $panier1->nbProduits = 5;
    // on ne met pas de $ devant nbProduits car cette propriété est publique
    echo '<pre>'; print_r($panier1); echo '</pre>';
    echo "Nombre de produits dans  mon panier : " . $panier1->nbProduits . "<hr>";
    echo "Panier 1 : " .$panier1->ajouterArticle().  '<hr>';
    //  on pioche une méthode de la class a travers l' objet, toujours des parentheses car on fait appel a une méthode/fonction public

    // echo "Panier 1 : " .$panier1->retireArticle().  '<hr>';
    //  la ligne ci dessus a généré une erreur car c' était une méthode "protected", utilisable seulement dans la class ou elle a été declarée, ou alors dans les class héritières ( ici, ce n' est pas le cas)
    // toujours erreur avec la ligne ci dessous, car c' est une méthode private (obligatoire dans la classe, même pas les héritieres)
    // echo "Panier 1 : " .$panier1->affichageArticle().  '<hr>';

    // Les niveaux de visibilité permettent de proteger les données. Par exemple, les données saisies dans un formulaire ne pourront etre attribuées a n' importe quelle propriété declarée. Elles passeront par des methodes qui permettront de controler ces données

    $panier2 = new Panier;
    echo '<pre>'; var_dump($panier2); echo '</pre>';

    // exo: affecter 3 produits a la propriété $nbProduits et afficher le nombre de produits dans le panier
    // même chose que exo 1 du dessus

    $panier2->nbProduits = 3;
    echo '<pre>'; print_r($panier2); echo '</pre>';
    echo "Nombre de produits dans  mon panier : " . $panier2->nbProduits . "<hr>";
    echo "Panier 2 : " .$panier2->ajouterArticle().  '<hr>';

    /*
    Niveaux de visibilité:

    public: accessible de partout
    protected: accessible de la class mere et heritieres
    private: accissible seulement de la class mere

    'new' est un mot clé permettant une instanciation ( créer un objet )
    Une class peut produire plusieurs objets
    $panier1 représnete l' objet issu de la class 'Panier'
    La class est le plan de construction et $panier1 représente un exemplaire de cette class
    */
?>