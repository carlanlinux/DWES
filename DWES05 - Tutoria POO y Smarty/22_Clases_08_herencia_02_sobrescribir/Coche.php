<?php

class Coche
{
    protected static $numRuedas;
    //si no se declara static no se puede acceder con el operador parent::
    protected $color;

    function __construct ()
    {
        echo "Estoy en el constructor de la clase Coche<br/>";
    }

    public function printCaracteristicas ()
    {
        echo " Color de printCaracteristicas de Coche: " . $this->getColor() . "<br/>";
    }

    public function getColor ()
    {
        return $this->color;
    }

    /* los argumentos de una función, si los tiene. tienen que ser los mismos
     * en la clase padre y en la heredada, si no se produce un error
     */

    public function setColor ($color)
    {
        echo "Estoy en setColor de Coche y pongo el color $color. <br/>";
        $this->color = $color;
    }
}

