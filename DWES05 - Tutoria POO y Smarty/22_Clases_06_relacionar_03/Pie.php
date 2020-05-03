<?php

/*
 * Esta clase construye el pie con una etiqueta footer
 */

class Pie
{
    private $titulo;

    public function __construct ($tit)
    {
        $this->titulo = $tit;
    }

    public function mostrar ()
    {
        echo '<footer style="text-align:left;color:blue">' . $this->titulo . '</footer>';
    }
}