<?php

class Persona4
{
    // Propiedades
    static public $num1;
    static protected $num3;
    static private $num2;
    public $provincia = null;
    public $pais = "ESPAÑA";
    public $importe = 100;
    protected $dni = null;
    private $nombre = null;
    private $apellidos = null;

    // Constructor vacío:

    function Persona4 ()
    {
    }

    // Métodos:
    function getNombre ()
    {
        return $this->nombre;
    }

    function setNombre ($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getPropiedades ()
    {
        $aPropiedades1 = get_class_vars("Persona4");
        foreach ($aPropiedades1 as $nombre => $valor) {
            echo $nombre . ": [" . $valor . "]<br/>";
        }
    }

    /*
     * Obtiene mediante la función get_class_vars un array con las
     * propiedades de la clase.
     * Como está definido dentro de la clase tenemos acceso a todas las
     * propiedades independientemente de su visibilidad.
     * Solo tendrán valor las propiedades a las que se le haya asignado
     * valor en la definición, ya que muestra las de la clase, no las
     * del objeto (que si tiene valores asignados)
     */

    public function getMetodos ()
    {
        $aMetodos = get_class_methods("Persona4");
        foreach ($aMetodos as $nombre => $valor) {
            echo $nombre . ": [" . $valor . "]<br/>";
        }
    }

    /* este método obtiene mediante la función get_class_methods un array con
     * los nombres de los métodos de una clase a los que tengamos acceso.
     * Como está definido dentro de la clase tendremos acceso a todos los
     * métodos independientemente de su visivilidad
     */

    private function getPais ()
    {
        return $this->pais;
    }
}

?>