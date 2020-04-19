<?php

//Creamos la funciónde autolad que lo que hará será añadir los includes necesarios y buscarlo en la localización que
// le digamos
function my_autoload ($class)
{
    //Que contanga palabras 1 o más que sean letras de la A a la Z
    if (preg_match('/\A\w+\Z/', $class)) {
        //Ponemos el include de la localización
        include 'classes/' . $class . '.class.php';
    }
}

//Lo incluimos en el registro de autoload con las clases que vamos a utilizar.
spl_autoload_register('my_autoload');

//si lo ejecuto sólo con esto, devuelve un error diciendo que no encuentra la clase
$bike = new BicycleEjemploAutoload();
$bike->brand = "Trek";
echo $bike->brand;

$bike = new UnicycleEjemploAutoload();
$bike->brand = "Juana";
echo $bike->brand;