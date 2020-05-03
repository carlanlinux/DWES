<?php
/*
 * Guarda en un array los datos que nos ha llegado por parámetro (que puede ser
 * el contenido de $_REQUEST o el de $_COOKIE y lo devuelve.
 */
function guardarDatos ($array)
{
    $aDatos["nombre"] = $array["nombre"];
    $aDatos["apellidos"] = $array["apellidos"];
    $aDatos["fondo"] = $array["fondo"];
    $aDatos["frente"] = $array["frente"];
    $aDatos["letra"] = $array["letra"];
    return $aDatos;
}

?>