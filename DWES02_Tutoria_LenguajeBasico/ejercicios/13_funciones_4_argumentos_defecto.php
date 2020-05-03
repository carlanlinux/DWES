<?php

echo "<h2>argumentos por defecto</h2>";
/*
 * por defecto el parámetro capital toma el valor Madrid y el parámetro
 * habitante toma el valor muchos.
 * si se llama a la función sin alguno de los parámtetros con valores
 * definidos, tomará los valores que están por defecto.
 * SIEMPRE se definen al final de la lista de argumentos.
 */
function capitales ($Pais, $Capital = "Madrid", $habitantes = "muchos")
{
    return ("La capital de $Pais es $Capital y tiene $habitantes habitantes.<br>");
}

//llamamos a la funcion sin capital ni habitantes
echo capitales("España");

//llamamos a la funcion sin habitantes
echo capitales("Portugal", "Lisboa");

//llamamos a la función con todos los parámetros
echo capitales("Francia", "Paris", "muchísimos");