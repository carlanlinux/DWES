<?php
// Incluimos el archivo con la definición de la Clase de la que heredamos
require_once("OperacionAritmetica.php");

class Restar extends OperacionAritmetica
{
    // Constructor:
    function Restar ()
    {
    }

    // Métodos redefinidos :

    public function realizarOperacion ()
    {
        return $this->getNumero1() - $this->getNumero2();
    }
}

?>