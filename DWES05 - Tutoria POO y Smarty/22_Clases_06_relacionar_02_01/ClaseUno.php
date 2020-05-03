<?php

class ClaseUno
{
    /* Contiene dos atributos privados, el constructor (en este caso tiene el 
     * mismo nombre que la clase), que recibe dos  parámetros y se los asigna a 
     * las propiedades de la clase y los métodos get que devuelven el valor de 
     * cada una de las propiedades.    
     */

    private $num1;
    private $num2;

    //Constructor con el nombre de la clase
    public function ClaseUno ($n1, $n2)
    {
        $this->num1 = $n1;
        $this->num2 = $n2;
    }

    public function getNum1 ()
    {
        return $this->num1;
    }

    public function getNum2 ()
    {
        return $this->num2;
    }
}
