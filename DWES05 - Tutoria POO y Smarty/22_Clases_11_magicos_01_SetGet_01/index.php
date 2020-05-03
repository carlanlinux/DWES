<?php
require_once("MiClase.php");

$obj = new miClase(1, "objeto1", "prueba1@ejemplo.com");

/* Los atributos de la clase están definidos como private, pero accedemos
 * a ellos como si tuvieran visibilidad pública gracias a los métodos mágicos.
 * Al tener definidos los métodos mágicos __set() y __get() PHP se encarga
 * de  ejecutarlos automáticamente al intentar acceder a las propiedades,
 * pero para ello los métodos mágicos deben estar definidos en la clase
 */
echo "ID:" . $obj->id . "<br/>";            // muestra 1
echo "Nombre:" . $obj->nombre . "<br/>";    //muestra objeto1
$obj->nombre = "he cambiado el nombre";
echo "Nombre:" . $obj->nombre . "<br/>";   //muestra He cambiado el nombre
echo "Apellidos:" . $obj->apellidos . "<br/>";   //muestra el mensaje de error definido en el método __get
$obj->apellidos = "Tengo apellidos";         //intentamos crearla
echo "Apellidos:" . $obj->apellidos . "<br/>";   //muestra el mensaje de error definido en el método __get
?>