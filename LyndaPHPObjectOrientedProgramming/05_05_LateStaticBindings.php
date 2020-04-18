<?php
class Sofa{
    protected static $identity = "Sofa Class";

    public static function identity_test(){
        //Llamdno self sacamos el de esta clase, la clase padre
        echo "self " . self::$identity . ".<br>";
        //Devuelve el valor de la clase hija que está en tiempo de ejecución
        echo "static" . static::$identity. ".<br>";

        echo "get_class" . get_class() . ".<br>";
        echo "get_called_class" . get_called_class() . ".<br>";
    }
}

class Loveseat extends Sofa{
    protected static $identity = "Lovesat class";
}

Sofa::identity_test();
echo "<hr>";
Loveseat::identity_test();