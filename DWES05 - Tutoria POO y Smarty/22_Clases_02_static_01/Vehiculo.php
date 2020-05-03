<?php

/*
 * Ejemplo sacado de Píldoras informáticas
 * Definimos una clase con los siguientes atributos:
 * - precio (private)
 * - descuento (privado estático) es un descuento que se aplicará a todos los coches
 *   independientemente de la configuración (por eso es estático, se aplica a la 
 *   clase, no al objeto.
 * - descuento_static_publico 
 */

class Vehiculo
{
    private static $descuento = 0;
    private $precio;

    /*
     * Constructor de la clase (en lugar de __construct() se ha llamado con el 
     * mismo nombre que la clase. 
     * Dependiendo del argumento el precio de partida 
     * del vehículo será diferente. Si no se envía argumento se propduce un error.
     * Si el cliente elige algún extra, el precio se incrementará
     */

    function Vehiculo ($tipo)
    {
        if ($tipo == "urbano")
            $this->precio = 10000;
        else if ($tipo == "compacto")
            $this->precio = 20000;
        else if ($tipo == "berlina")
            $this->precio = 30000;
        else
            $this->precio = 40000;
    }

    /* El método climatizador añade 200 euros al precio, es decir si el cliente
     * quiere que su vehículo lleve climatizador le saldrá 200€ más caro
     */

    static function promocion_descuento ()
    {
        if (date("d-m-y") > "10-11-2019") {
            self::$descuento = 4500;
        }
    }

    /* Si el cliente quiere gps el precio aumenta 2500€*/

    function climatizador ()
    {
        $this->precio += 200;
    }

    /* Si el cliente quiere tapicería de cuero, el precio aumentará
     * en función del color de la tapicería. Si no elige color será 5000€ más.
     */

    function gps ()
    {
        $this->precio += 2500;
    }

    /* este método se encarga de calcular el precio total del vehículo 
     * aplicando el descuento que en este mometo es 0.
     */

    function tapiceria_cuero ($color)
    {
        switch ($color) {
            case "blanco":
                $this->precio += 3000;
                break;
            case "beige":
                $this->precio += 3500;
                break;
            default:
                $this->precio += 5000;
                break;
        }
    }

    /* Este método de tipo estático asignará un valor a la propiedad descuento 
     * si la fecha actual es posterior a la fecha indicada (por ejemplo una 
     * campaña en la que se aplique un descuento de 4500 euros
     */

    function precio_final ()
    {
        $precio_total = $this->precio - self::$descuento;
        return $precio_total;
    }
}
