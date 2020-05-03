<?php

/*
 * El método mágico __set() comprueba si existe la propiedad a la que desea 
 * asignarle un valor en la clase. Si es así realiza la asignación, si no 
 * muestra un mensaje indicando que la propiedad no existe.
 * El método mágico __get() devuelve la propiedad solicitada si existe.
 */

class MiClase
{
    private $id;
    private $nombre;
    private $email;

    function __construct ($id, $nombre, $email)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function __toString ()
    {
        return $this->nombre . " " . $this->email;
    }
}

?>