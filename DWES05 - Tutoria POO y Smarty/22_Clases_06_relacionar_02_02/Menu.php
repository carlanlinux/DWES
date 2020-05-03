<?php

/**
 * El atributo dir indicará si el menú va a ser horizontal o vertical
 */
class Menu
{
    private $opciones = array();
    private $direccion;

    public function __construct ($dir)
    {
        $this->direccion = $dir;
    }

    public function insertar ($op)
    {
        /* En cada elemento del del array hay un objeto de tipo configuración 
         * que le llega por parámetro, por tanto tiene acceso a sus propiedades
         * públicas y métodos. Recuerda que al asignar un objeto a una variable, 
         * se crea un identificador para el mismo objeto (un solo objeto con 
         * dos nombres)
         */
        $this->opciones[] = $op;
    }

    public function mostrar ()
    {
        if (strtolower($this->direccion) == "horizontal")
            $this->mostrarHorizontal();
        else
            if (strtolower($this->direccion) == "vertical")
                $this->mostrarVertical();
    }

    private function mostrarHorizontal ()
    {
        /* llama al método mostrar del objeto configuración */
        for ($f = 0; $f < count($this->opciones); $f++) {
            $this->opciones[$f]->mostrar();
        }
    }

    private function mostrarVertical ()
    {
        for ($f = 0; $f < count($this->opciones); $f++) {
            /* llama al método mostrar del objeto configuración */
            $this->opciones[$f]->mostrar();
            echo '<br>';
        }
    }
}
