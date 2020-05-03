<?php
require_once 'Operacion.php';

class Suma extends Operacion
{
    public function operar ()
    {
        $this->resultado = $this->num1 + $this->num2;
    }
}
