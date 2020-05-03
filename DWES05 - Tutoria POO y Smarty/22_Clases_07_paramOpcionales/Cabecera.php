<?php
/*
 * Por defecto la ubicación será centrada, color de texto blanco y color de 
 * fondo negro, si no se envían estos tres argumentos.
 * No se puede dejar un argumento en medio de la lista sin enviar
 * Siempre tomará de izquierda a derecha.
 */

class Cabecera
{
    private $titulo;
    private $ubicacion;
    private $colorFuente;
    private $colorFondo;

    public function __construct ($tit, $ubi = 'center', $colorFuen = '#ffffff', $colorFon = '#000000')
    {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        $this->colorFuente = $colorFuen;
        $this->colorFondo = $colorFon;
    }

    public function mostrar ()
    {
        echo '<div style="font-size:40px;text-align:' . $this->ubicacion . ';color:';
        echo $this->colorFuente . ';background-color:' . $this->colorFondo . '">';
        echo $this->titulo;
        echo '</div><br><hr>';

    }
}
