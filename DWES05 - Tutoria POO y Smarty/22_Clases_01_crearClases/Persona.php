<?php

class Persona
{
    // Propiedades
    const PERSONA_HOMBRE = "HOMBRE";
    const PERSONA_MUJER = "MUJER";
    public $edad = null;

    // Constantes: se definen sin el símbolo $ y se suelen definir en
    // maýusculas, para diferencialas de las propiedades. Su valor va
    // siempre entre comillas
    private $nombre = null;
    private $apellidos = null;

    // Constructor de la clase:

    function __construct ()
    {
        echo "<p>En el Constructor de la Clase</p>";
    }

    /*
    // El constructor también puede hacerse con el mismo nombre de la Clase
    function Persona() {
        echo "<p>En el Constructor de la Clase</p>";
    }
    */

    // Destructor:
    function __destruct ()
    {
        echo "<p>En el Destructor de la Clase " . get_class($this) .
            " con nombre " . $this->nombre . "</p>";
    }

    // Métodos:

    public function getNombre ()
    {
        return $this->nombre;
    }

    public function setNombre ($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos ()
    {
        return $this->apellidos;
    }

    public function setApellidos ($apellidos)
    {
        $this->apellidos = $apellidos;
    }
}

?>