<?php
require_once('autoload.php');

$controller = new Controller\Controller; // l'autoload voit passer le mot clé 'new' et fait appel au fichier Controller.php. Et dans un 2ème temps, dans le controller.php il y a une instance 'new' de EntityRepository, donc l'autoload s'execute et fait appel au fichier EntityRepository

// echo '<pre>'; var_dump($controller); echo '</pre>';

$controller->handlerRequest(); // on fait appel à la méthode handlerRequest() se trouvant dans la fichier controller.php

