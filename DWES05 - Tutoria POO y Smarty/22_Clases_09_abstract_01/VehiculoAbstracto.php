<?php

abstract class VehiculoAbstracto
{
    protected $ruedas;

    abstract public function getRuedas ();

    public function setRuedas ($ruedas)
    {
        $this->ruedas = $ruedas;
    }

    abstract public function setPotencia ($potencia);

    abstract public function getPotencia ();
}
