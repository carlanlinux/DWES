<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Functions Scope</title>
</head>
<body>
Lsa variables de las funciones sólo se pueden usar en las funciones por defecto.
Una variables es sólo accesible en su contexto.
Global Scope: Todo el código
Local Scope: sólo en funciones.
<hr>
<?php
    $bar = "outside"; //Global scope

    function foo($bar) {
        if (isset($bar)){
            echo "foo: " . $bar . "<br>";
        }
    $bar = "inside"; //Local scope
    }

    echo "1. " . $bar . "<br>";

    foo($bar);
    echo "2. " . $bar . "<br>";

?> <hr>
Lo mejor es no usar variables globales, tieen que ser casos muy concretos y muy especiales.
Cuanto menos se use la palabra global mejor. <br>
<?php

function fooGlobal() {
    global $bar; //Prermite añadir global variables y modificarlas dentro de una función.
    if (isset($bar)){
        echo "foo: " . $bar . "<br>";
    }
    $bar = "inside"; //Aquí me está cambiando la variable global.
}

echo "1. " . $bar . "<br>";

fooGlobal();
echo "2. " . $bar . "<br>";

?> <br>
</body>
</html>



