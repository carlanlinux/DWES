<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'Clase1.php';

class Clase2 extends Clase1
{

    const CONSTANTE_2 = 33;
    static $variable_estatica_2 = 44;
    static $variablex = "-----";
    public $variable_2 = "CLASE2";

    /* constructor vacío*/

    function Clase2 ()
    {
    }

    public function mostrar ()
    {
        echo "<h2>Función mostrar de Clase 2</h2>";
        echo "<h4>Accedemos a las propiedades y a la constante de clase1 usando "
            . "el nombre de la clase y ::</h4>";
        echo "Clase1::CONSTANTE_1 = " . Clase1::CONSTANTE_1 . "<br />";
        echo "Clase1::\$variable_estatica_1 (public)= " . Clase1::$variable_estatica_1 . "<br />";
        echo "Clase1::\$variable_estatica_x (protected)= " . Clase1::$variablex . "<br />";
        echo "<hr>";

        echo "<h4>Accedemos a las propiedades y a la constante de clase1 usando "
            . "parent y ::</h4>";

        echo "parent::CONSTANTE_1 = " . parent::CONSTANTE_1 . "<br />";
        echo "parent::\$variable_estatica_1 (public)= " . parent::$variable_estatica_1 . "<br />";
        echo "parent::\$variable_estatica_x (protected)= " . parent::$variablex . "<br/>";
        echo "<hr>";

        echo "<h4>Accedemos los métodos de  Clase1 usando parent y ::</h4>";
        echo "parent::metodo_publico()= ";
        parent::metodo_publico();
        echo "parent::metodo_estatico()= ";
        parent::metodo_estatico();
        echo "<hr>";

        echo "<h4>Accedemos propiedades de  Clase1 usando self y ::</h4>";
        echo "self::\$variable_estatica_1 (public)= " . self::$variable_estatica_1 . "<br />";
        echo "self::\$variablex (protected)= " . self::$variablex . "<p />";
        echo "<hr>";

        echo "<h4>Accedemos propiedades de  Clase1 y Clase2 usando \$this</h4>";

        echo "\$this->variable_1 (public Clase1)= " . $this->variable_1 . "<br />";
        echo "\$this->variable_2 (public Clase2)= " . $this->variable_2 . "<br />";
        echo "\$self::CONSTANTE_2 (constante Clase2)=" . self::CONSTANTE_2 . "<br />";
        echo "\$self::\$variable_estatica_2 (static Clase2)= " . self::$variable_estatica_2 . "<br />";
        echo "self::\$variablex (static Clase1)= " . self::$variablex . "<br />";

        echo "<hr>";
        echo "<p><b>NOTA</b>: si usamos 'self' para acceder a miembros que no existen en la clase actual pero sí en su clase padre,<br/> se accederá también a ellos:</p>";

        echo "Accediendo a la constante de 'Clase1' desde 'Clase2' (self) -> [" . self::CONSTANTE_1 . "]<br />";
        self::metodo_publico();
        self::metodo_estatico();

    }
}
