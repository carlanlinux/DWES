<?php

class MiClase
{
    private $id;
    private $nombre;

    function __construct ($id, $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function __get ($propiedad)
    {
        if (property_exists(__CLASS__, $propiedad)) {
            return $this->$propiedad;
        } else
            return "método __get() NO existe el atributo '"
                . $propiedad . "'<br/>";
    }

    public function __set ($propiedad, $valor)
    {
        //mira si existe la propiedad $var en la clase, y si es así le asigna el valor que
        //se pasa por parámetro
        //__CLASS__ es una constante predefinida en PHP que contiene el nombre de la clase
        //echo "CLASE:".__CLASS__;
        if (property_exists(__CLASS__, $propiedad)) {
            echo "método __set(), la propiedad '$propiedad' "
                . "existe y le asigno el valor '$valor' <br>";
            $this->$propiedad = $valor;
        } else {
            echo "método __set(), la propiedad '$propiedad' "
                . "NO existe , "
                . "la creo, y asigno el valor $valor <br/>";
            //Podemos  crear la nueva propiedad
            $this->$propiedad = $valor;
        }
    }

    /* utiliamo el símbolo $ en $propiedad porque no es una propiedad de la
     * clase, sino una variable que nos llega por parámetro.
     */

    public function __isset ($propiedad)
    {
        return isset($this->$propiedad);
    }

    public function __unset ($propiedad)
    {
        unset($this->$propiedad);
    }
}

?>