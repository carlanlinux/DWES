<?php

/*
 * Hay que incluir el fichero que contiene la clase antes de  crearla, si no se 
 * producirá un error
 */
include "Coche.php";

/* Para crear un objeto de una clase se escribe la palabra new seguida del 
 * nombre de la clase y los paréntesis de apretura y cierre.
 * $coche es un objeto de la clase Coche.
 */
$coche = new Coche();

/* para acceder a los atributos o métodos de un objeto creado se utiliza el 
 * operador flecha. Los nombres de las propiedades no llevan el símbolo $, solo 
 * el nombre del objeto lo lleva.
 */
$coche->color = "rojo";

echo "Color del coche = $coche->color <br>";
echo "Tipo de coche = ";
$coche->mostrarTipo();
        