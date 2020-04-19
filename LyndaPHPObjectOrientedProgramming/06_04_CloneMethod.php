<?php

class Berverage
{
    public $name;

    public function __construct ()
    {
        echo "New Berverage was created.<br>";
    }

    public function __clone ()
    {
        // TODO: Implement __clone() method.
        echo "New Berverage was copied.<br>";
    }

}

$a = new Berverage();
$a->name = "Coffee";
echo $a->name . ".<br>";
echo "<hr>";

$b = clone $a; //Estamos clonando, genera un object ID diferente.
echo $a->name . ".<br>";
echo $b->name . ".<br>";

$b->name = "Tea";
echo $a->name . ".<br>";
echo $b->name . ".<br>";

$c = $b; // Asignación Referencia, cualquier cambio en C afecta a B, porque son el mismo object ID
$c->name = 'Orange Juice';
echo $a->name . ".<br>";
echo $b->name . ".<br>";
echo $c->name . ".<br>";