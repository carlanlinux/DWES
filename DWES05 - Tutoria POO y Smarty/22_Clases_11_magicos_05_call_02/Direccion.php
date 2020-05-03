<?php

class Direccion
{
    protected $ciudad;
    protected $pais;


    public function getCiudad ()
    {
        return $this->ciudad;
    }

    public function setCiudad ($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    public function getPais ()
    {
        return $this->pais;
    }

    public function setPais ($pais)
    {
        $this->pais = $pais;
    }
}

?>