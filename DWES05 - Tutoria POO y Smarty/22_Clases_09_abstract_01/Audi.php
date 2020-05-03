<?php
include 'VehiculoAbstracto.php';

class Audi extends VehiculoAbstracto
{
    public $marca = 'Audi';
    protected $potencia;

    public function getPotencia ()
    {
        return $this->potencia;
    }

    public function setPotencia ($potencia)
    {
        $this->potencia = $potencia;
    }

    public function getRuedas ()
    {
        return $this->ruedas;
    }
}
