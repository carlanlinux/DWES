<?php
include "Persona.php";
/* Creamos un objeto de la clase persona e inicializamos sus propiedades */
$pedro = new Persona;
$pedro->setNombre("Pedro García");
echo "<h3>Asigno la ciudad usando un método que es de la clase Dirección</h3>";
$pedro->setCiudad("Madrid");
echo "<h3>Asigno el país usando un método que es de la clase Dirección</h3>";
$pedro->setPais("España");

echo "<h3>Muestro el nombre mediante método de la clase Persona</h3>";
echo "Nombre: " . $pedro->getNombre() . "<br>";
echo "<h3>Intento acceder al método \$obj->getCiudad() de la clase dirección</h3>";
echo "Resultado obtenido ciudad: " . $pedro->getCiudad() . "<br>";
echo "<h3>Intento acceder al método \$obj->getPais() de la clase dirección</h3>";
echo "Resultado obtenido País: " . $pedro->getPais() . "<br/>";
?>

