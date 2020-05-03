<?php

class Persona
{
    // Propiedades
    private $nombre = null;

    public function getNombre ()
    {
        return $this->nombre;
    }

    public function setNombre ($nombre)
    {
        $this->nombre = $nombre;
    }
}

?>