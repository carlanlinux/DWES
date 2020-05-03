<?php

/* define dos atributos privados, num1 y num2, el método constructor, que
 * recibe dos números como parámetros, y el método multiplica que devuelve el 
 * resultado de multiplicar los valores de esas propiedades.
 */

class ClaseDos
{
    private $num1;
    private $num2;

    public function __construct ($n1, $n2)
    {
        $this->num1 = $n1;
        $this->num2 = $n2;
    }

    public function multiplica ()
    {
        return $this->num1 * $this->num2;
    }
}
