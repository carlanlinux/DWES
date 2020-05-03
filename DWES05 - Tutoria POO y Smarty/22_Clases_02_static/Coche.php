<?php

/*
 * La clase contiene:
 * Dos propiedades estáticas, una pública y otra privada.
 * Una contante
 * Tres métodos estáticos.
 * 
 */

class Coche
{
    const RUEDAS = 4;
    public static $color = 'rojo';
    private static $colorTecho = 'negro';

    /*
     * Como los métodos estáticos pueden ser llamados sin crear una instancia del
     * objeto, la pseudovariable $this no se puede usar en ellos. Se utiliza self::
     */

    public static function mostrarColor ()
    {
        return self::$color;
    }

    public static function Saluda ()
    {
        echo self::dimeColorTecho();

    }

    //lamar a un método estático desde otro

    public static function dimeColorTecho ()
    {
        return self::$colorTecho;
    }
}

