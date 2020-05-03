<?php

/*
 * En ese ejemplo vamos a ir guardando las propiedades que nos lleguen al
 * método mágico __set en un array asociativo, cuya clave será el nombre de +
 * la propiedad.
 * Esta es una opción muy cómoda de utilizar
 * La propiedad datos será un array en el que guardemos los datos de una
 * persona.
 * el método __get() recibe como parámetro el nombre de una propiedad, y si
 * existe en el array datos la devuelve, si no, devuelve un mensaje de error.
 */

class Persona
{
    private $datos;

    public function __get ($propiedad)
    {
        if (isset($this->datos[$propiedad])) {
            return $this->datos[$propiedad];
        } else {
            return "La propiedad " . $propiedad . " no existe";
        }

    }

    //crea la propiedad
    public function __set ($propiedad, $valor)
    {
        $this->datos[$propiedad] = $valor;
    }

    public function muestraPropiedades ()
    {
        foreach ($this->datos as $propiedad => $valor) {
            echo "Propiedad: $propiedad, valor: $valor <br>";
        }
    }
}

?>