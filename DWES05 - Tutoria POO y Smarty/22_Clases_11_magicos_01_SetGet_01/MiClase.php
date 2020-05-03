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
        //__CLASS__ es una constante predefinida en PHP que contiene el nombre de la clase
        //echo "CLASE:".__CLASS__;
        if (property_exists(__CLASS__, $propiedad)) {
            $this->$propiedad = $valor;
        } else {
            //podemos devolver un mensaje indicando que no existe.
            return "método __set() No existe el atributo $propiedad.";
        }
    }
}

?>