<?php

class Coche
{
    const RUEDAS = 4;
    public static $color = 'rojo';
    private static $colorTecho = 'negro';

    /*
     * Como los métodos estáticos pueden ser llamados sin crear una instancia del
     * objeto, la pseudovariable $this no se puede usar dentro de los métodos
     * estáticos. Se utiliza ::self
     * 
     */

    public static function Saluda ()
    {
        echo "Hola " . self::mostrarColor();

    }

    public static function mostrarColor ()
    {
        return self::$color;
    }

    //lamar a un método estático desde otro estático

    public static function Saluda2 ()
    {
        echo "<br/>Hola de nuevo " . self::metodoNormal2();

    }

    //llamar a un método estático desde otro no estático

    public function metodoNormal2 ()
    {
        echo "<br/>Hola caracola";;
    }

    public function metodoNormal ()
    {
        echo "<br/>el techo es " . $this->dimeColorTecho();
    }
    //llamar a un método no estático desde uno estático
    // si el método no estático utilizara $this daría error
    // probar a llamar a metodoNormal

    public static function dimeColorTecho ()
    {
        return self::$colorTecho;
    }
}

Coche::Saluda();
$c = new Coche();
$c->metodoNormal();
$c->Saluda2();
Coche::Saluda2();

