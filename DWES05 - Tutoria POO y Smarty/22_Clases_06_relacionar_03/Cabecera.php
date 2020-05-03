<?php

/*
 * Esta clase construye el título h1 de una página web
 */

class Cabecera
{
    private $titulo;

    public function __construct ($tit)
    {
        $this->titulo = $tit;
    }

    public function mostrar ()
    {
        echo '<h1 style="text-align:center;color:red">' . $this->titulo . '</h1>';
    }
}
