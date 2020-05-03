<?php
require 'ClaseUno.php';

class ClaseDos
{
    /*
     * define un método “multiplica” que recibe como parámetro un objeto de
     * la cClaseUno. Devuelve el resultado de multiplicar los atributos de
     * la ClaseUno obtenidos mediante sus respectivos métodos get().
     */
    public function multiplica (ClaseUno $claseUno)
    {
        return $claseUno->getNum1() * $claseUno->getNum2();
    }
}
