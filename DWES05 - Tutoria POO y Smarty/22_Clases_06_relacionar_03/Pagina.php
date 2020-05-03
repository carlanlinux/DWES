<?php
/*
 * En este ejemplo se crean objetos de otras clases en la definición de esta.
 * En el contructor se inicializan las propiedades (que son objetos) a objetos 
 * nuevos, cada uno de su correspondiente clase y asignabo los parámetros en
 * los objetos que lo requieren.
 * El método insetarCuerpo llama al método insertarParrafo del objeto de la 
 * clase Cuerpo.
 * El método mostrar invoca a cada uno de los métodos mostrar de sus respectivas
 * clases.
 */
require 'Cabecera.php';
require 'Pie.php';
require 'Cuerpo.php';

class Pagina
{
    private $cabecera;
    private $cuerpo;
    private $pie;

    public function __construct ($texto1, $texto2)
    {
        $this->cabecera = new Cabecera($texto1);
        $this->cuerpo = new Cuerpo();
        $this->pie = new Pie($texto2);
    }

    public function insertarCuerpo ($texto)
    {
        $this->cuerpo->insertarParrafo($texto);
    }

    public function mostrar ()
    {
        $this->cabecera->mostrar();
        $this->cuerpo->mostrar();
        $this->pie->mostrar();
    }
}
