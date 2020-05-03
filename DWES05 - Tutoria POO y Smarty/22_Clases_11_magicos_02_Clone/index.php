<?php
require_once("MiClase.php");

$obj = new miClase(1, "objeto");

echo "<h3>Creamos objeto y mostramos valores iniciales</h3>";
echo "NumObj: " . $obj->numObj . "<br/>";            // muestra 1
echo "Nombre:" . $obj->nombre . "<br/>";    //muestra objeto
$obj->nombre = "he cambiado el nombre";
echo "Nombre:" . $obj->nombre . "<br/>";   //muestra He cambiado el nombre
echo "<h3>Muestro objeto antes de clonar</h3>";
var_dump($obj);

echo "<h3>clonamos objeto y muestro el contenido de la copia</h3>";
$p = clone $obj;
var_dump($p);

echo "<h3>clonamos otra vez objeto inicial y muestro el contenido de la copia</h3>";
$cpy = clone $obj;
var_dump($cpy);
?>
