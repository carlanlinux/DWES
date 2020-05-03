<?php
/* tiene un atributo privado y un método que recibe dos parámetros y en el que 
 * se crea un objeto de la clase2 (hay que incluir el script ClaseDos.php) al 
 * que se le pasan los parámetros recibidos. Este método devuelve el resultado 
 * de invocar el método multiplica de la ClaseDos.
 */
require_once 'ClaseDos.php';

class ClaseUno
{
    private $result;

    public function unMetodo ($n1, $n2)
    {
        $cl2 = new ClaseDos($n1, $n2);
        return $cl2->multiplica();
    }
}
