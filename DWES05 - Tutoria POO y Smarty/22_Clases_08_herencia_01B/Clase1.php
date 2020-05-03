<?php

/*
 * 
 */

class Clase1
{
    const CONSTANTE_1 = "texto cte clase1";
    static $variable_estatica_1 = 22;
    static protected $variablex = "*****";
    public $variable_1 = "CLASE1";

    function Clase1 ()
    {
    }

    static function metodo_estatico ()
    {
        echo "Estoy en el método estático de 'Clase1', la variable estática vale: "
            . self::$variable_estatica_1 . "<br />";
    }

    public function metodo_publico ()
    {
        echo "Estoy en el método público de 'Clase1', \$variable_1 vale: " . $this->variable_1 .
            " y la variable estática vale: " . self::$variable_estatica_1 . "<br />";
    }

}


?>