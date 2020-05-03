<?php
require_once("Persona.php");
// Crear una instancia del objeto:
$objPersona1 = new Persona();
//asigna valores a las
$objPersona1->nombre = "Pepito";
$objPersona1->apellidos = "Grillo";
$objPersona1->edad = 60;
echo "<h3>Mostramos los valores asignados al objeto (guardados en un array)</h3>";
echo "Nombre: " . $objPersona1->nombre . "<br/>";
echo "Dirección: " . $objPersona1->direccion . "<br/>";
echo "Edad: " . $objPersona1->edad . "<br/>";
echo "<h3>Intentamos mostrar el valor de una propiedad que no existe</h3>";
echo "propiedad texto: " . $objPersona1->texto . "<br/>";
echo "<br/>";
echo "<h3>Mostramos con var_dump() el contenido del objeto</h3>";
var_dump($objPersona1);
echo "<br/>";

echo "<h3>Llamamos a un método de la clase que muestra "
    . "el contenido del array mediente un bucle</h3>";
$objPersona1->muestraPropiedades();
?>
