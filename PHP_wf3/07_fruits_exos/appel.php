<?php
// exo: afficher le prix de 2kg de bananes en executant la focntion 'calcul' sans la copier coller ou la changer

require_once('focntion.php');
// permet d' appeler 'calcul' dans le fichier fonction
// ou include_once, avec ensuite même syntaxe
//  c' est équivalent au copier coller
echo calcul('bananes', 2000);

?>