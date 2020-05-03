<?php

class Operacion
{
    protected $num1;
    protected $num2;
    protected $resultado;

    public function cargar1 ($v)
    {
        $this->num1 = $v;
    }

    public function cargar2 ($v)
    {
        $this->num2 = $v;
    }

    public function mostrarResultado ()
    {
        echo $this->resultado . '<br>';
    }

    public function operar ()
    {
        $this->resultado = $this->num1 * $this->num2;
    }
}

