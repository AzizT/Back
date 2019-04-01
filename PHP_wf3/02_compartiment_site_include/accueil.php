<?php
require_once("include/header.php");
// va permettre d' aller chercher le header dans le dossier include ( et aisni ne modifier qu' un seul fichier pour en modifier plusieurs autres)
// require, en cas d' erreur bloque la totalité du script => message d' erreur
// include va aussi générer un message d' erreur, tout en affichant le html de la page demandée (tronquée, sans css etc...)
// peut-etre mieux utiliser le require pour s' obliger a tout débugger dès le début
// once permet de vérifier si un fichier a déjà été inclus. Si c' est le cas, il ne le réinclus pas
require_once("include/nav.php");

?>

<section class="p-4 text-center border border-dark" style="height:400px">

    voici le contenu de la page d' accueil <br>
    voici le contenu de la page d' accueil <br>
    voici le contenu de la page d' accueil <br>
    voici le contenu de la page d' accueil <br>
    voici le contenu de la page d' accueil <br>



</section>


<?php
require_once("include/footer.php");

?> 