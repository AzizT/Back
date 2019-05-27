<?php

// habituellement pour faire appel a des fichiers, nous executons require_once() mais imaginons que nous ayons 100 class declarées dans les 100 fichiers, nous ne devons pas faire 100 require_once

//  require_once("a_class.php") 
//  require_once("b_class.php") 
//  require_once("c_class.php") 
//  require_once("d_class.php") 

require_once('autoload.php');

// instancier les 4 class

$a = new A;
$b = new B;
$c = new C;
$d = new D;

?>