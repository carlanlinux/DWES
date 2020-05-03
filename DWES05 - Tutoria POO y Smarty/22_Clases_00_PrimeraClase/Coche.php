<?php

/*
 * Definimos la clase en su propio fichero, con el mismo nombre (comenzando por 
 * mayúscula. 
 */

class Coche
{
    /* podemos asignar un valor en la definición de un atributo, en ese caso,
     * los objetos que se instancien a partir de la clase, tendrán ese valor 
     * inicialmente en el atributo.
     */
    public $tipo = "turismo";
    public $color;

    /* para acceder a los atributos desde los métodos de la clase, se usa la 
     * pseudovariable $this seguida del operador flecha. $this es una referencia
     * al objeto que invocó el método.
     * Sin no usamos $this estaremos creando una variable local y fallará.
     * El nombre de la propiedad no lleva el símbolo $ al ser referenciada, solo
     * en la declaración.
     */
    public function mostrarTipo ()
    {
        echo $this->tipo;
    }
}
