<?php

/*
 * Ejemplo de la página
 * http://www.tutorialesprogramacionya.com/phpya/poo/temarios/descripcion.php?cod=37&punto=3&inicio=0
 * 
 * Crea un menú de enlaces utilizando una clase.
 * Contiene dos atributos privados:
 * - enlaces que contendrá un array de enlaces.
 * - titulos que contendrá un array con los nombres de los enlaces.
 * Tiene dos métodos definidos:
 * - cargarOpción: en la que se añade a cada array los elementos que le llegan 
 * como parámetro (enlace y nombre que se le va a dar a ese enlace).
 * - mostrar: crea dinámicamente los enlaces partiendo de los atributos de la clase
 * 
 */

class Menu
{
    private $enlaces = array();
    private $titulos = array();

    public function cargarOpcion ($en, $tit)
    {
        $this->enlaces[] = $en;
        $this->titulos[] = $tit;
    }

    public function mostrar ()
    {
        for ($f = 0; $f < count($this->enlaces); $f++) {
            echo '<a href="' . $this->enlaces[$f] . '">' . $this->titulos[$f] . '</a>';
            echo "-";
        }
    }
}
