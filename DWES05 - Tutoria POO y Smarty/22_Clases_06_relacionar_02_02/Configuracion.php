<?php

/*
 * Esta clase tiene definidas las propiedades para cada enlace de un menu:
 * - el título: nombre del enlace.
 * - el enlace a la página
 * - el color de fondo que se le va a poner al enlace
 * En el método constructor se inicializan estas propiedades.
 * En el método mostrar de crea dinámicamente el enlace con las propiedades 
 * definidas.
 */

class Configuracion
{
    private $titulo;
    private $enlace;
    private $colorFondo;

    public function __construct ($tit, $enl, $cfon)
    {
        $this->titulo = $tit;
        $this->enlace = $enl;
        $this->colorFondo = $cfon;
    }

    public function mostrar ()
    {
        echo '<a style="background-color:' . $this->colorFondo .
            '" href="' . $this->enlace . '">' . $this->titulo . '</a>';
    }
}
