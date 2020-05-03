<?php

/*
 * En esta clase se guarda en un array los textos que le llegan como parámetro
 * El método mostrar crea un párrafo para cada elemento del array
 */

class Cuerpo
{
    private $lineas = array();

    public function insertarParrafo ($li)
    {
        $this->lineas[] = $li;
    }

    public function mostrar ()
    {
        for ($f = 0; $f < count($this->lineas); $f++) {
            echo '<p>' . $this->lineas[$f] . '</p>';
        }
    }

}
