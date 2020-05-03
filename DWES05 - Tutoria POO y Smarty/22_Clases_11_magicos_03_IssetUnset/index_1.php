<?php
require_once("MiClase_1.php");
$obj = new miClase(1, "objeto1");

/* Accedemos a propiedades privadas como si fueran públicas mediante el
 * operador flecha
 */
echo "<h3>Muestro usando el operador flecha los atributos de la clase id "
    . "y nombre asignados en el constructor:</h3>";
echo "ID: " . $obj->id . "<br/>";            // muestra 1
echo "Atributo Nombre: " . $obj->nombre . "<br/>";    //muestra objeto1
echo "<hr>";

echo "<h3>compruebo si existe la propiedad nombre con isset():</h3>";
if (isset($obj->nombre))
    echo "La propiedad \$obj->nombre existe<br>";
else
    echo "La propiedad \$obj->nombre NO existe<br>";

echo "<h3>compruebo si existe la propiedad telefono con isset():</h3>";
if (isset($obj->telefono))
    echo "La propiedad  \$obj->telefono existe<br>";
else
    echo "La propiedad \$obj->telefono NO existe<br>";

echo "<h3>Elimino la propiedad nombre del objeto con unset():</h3>";
unset($obj->nombre);
echo "<h3>Si intento mostrar ahora la propiedad nombre da error:</h3>";
echo "Nombre: " . $obj->nombre . "<br>";
?>