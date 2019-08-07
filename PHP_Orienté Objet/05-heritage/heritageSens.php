<?php
class A
{
    public function test1()
    {
        return "test1<hr>";
    }
}
//----------------------------------
class B extends A
{
 public function test2()
    {
        return "test2<hr>";
    }
}
//----------------------------------
class C extends B
{
 public function test3()
    {
        return "test3<hr>";
    }
}
//---------------------------------
// Exo : créer un objet de la classe C et afficher les méthodes issues de celle-ci
$chapeau = new C;
 echo '<pre>'; print_r(get_class_methods($chapeau)); echo '</pre>'; // permet d'afficher les méthodes issues de la classe
echo $chapeau->test1();
echo $chapeau->test2();
echo $chapeau->test3();

// Si la classe A hérite et que la classe C hérite de B alors la classe C hérite de A