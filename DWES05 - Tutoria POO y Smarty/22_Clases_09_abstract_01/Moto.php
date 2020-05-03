<?php
include_once 'VehiculoAbstracto.php';

class Moto extends VehiculoAbstracto
{
    public function __construct ($ruedas)
    {
        $this->setRuedas($ruedas);
    }

    public function getRuedas ()
    {
        return $this->ruedas;
    }

    public function setPotencia ($potencia)
    {
        $this->potencia = $potencia;
    }

    public function getPotencia ()
    {
        return $this->potencia;
    }
}


