<?php
class A
{
    public function test1()
    {
        return "test 1 <hr>";
    }
}
// **********************************************
class B extends A
{
    public function test2(){
        return "test 2 <hr>";
    }
}
// **********************************************
class C extends B
{
    public function test3()
    {
        return "test 3 <hr>";
    }
}

// exo: créer un objet de la classe C et afficher les methodes issues de celle ci
$c = new C;
echo '<pre>'; print_r(get_class_methods($c)); echo '</pre>';
echo $c->test1();
echo $c->test2();
echo $c->test3();
// si la classe b hérite de la classe de A et que C hérite de B, alors il hérite aussi de A
?>