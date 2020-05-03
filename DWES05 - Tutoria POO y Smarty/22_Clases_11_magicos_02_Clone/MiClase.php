<?php

class MiClase
{
    static $numInstances = 0;
    private $numObj;
    private $nombre;

    function __construct ($numObj, $nombre)
    {
        $this->numObj = $numObj;
        $this->nombre = $nombre;
        ++self::$numInstances;
    }

    public function __get ($propiedad)
    {
        if (property_exists(__CLASS__, $propiedad)) {
            return $this->$propiedad;
        } else
            return "método __get() No existe el atributo " . $propiedad;
    }

    public function __set ($propiedad, $valor)
    {
        //mira si existe la propiedad $var en la clase, y si es así le asigna el valor que
        //se pasa por parámetro
        //__CLASS__ es una constante predefinnumObja en PHP que contiene el nombre de la clase
        //echo "CLASE:".__CLASS__;
        if (property_exists(__CLASS__, $propiedad)) {
            $this->$propiedad = $valor;
        } else {
            //podemos devolver un mensaje indicando que no existe.
            return "método __set() No existe el atributo $propiedad.";
        }
    }

    function __clone ()
    {
        $this->numObj = ++self::$numInstances;
        $this->nombre = $this->nombre . "-" . $this->numObj;
    }
}

?>