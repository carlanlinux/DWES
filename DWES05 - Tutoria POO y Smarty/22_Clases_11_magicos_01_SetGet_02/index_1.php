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

echo "<h3>Cambio el valor de la propiedad nombre mediante "
    . "método mágico:</h3>";
$obj->nombre = "he cambiado el nombre";
echo "Atributo Nombre: " . $obj->nombre . "<br/>";   //muestra He cambiado el nombre
echo "<hr>";
echo "<h3>Intento mostrar el valor del atributo apellidos, "
    . "que no existe en la clase:</h3>";
echo "Apellidos: " . $obj->apellidos . "<br/>";   //muestra el mensaje de error definido en el método __get
echo "<hr>";

echo "<h3>Voy a intentar asignar un valor al atributo apellidos, "
    . "que no existe en la clase:</h3>";
$obj->apellidos = "Tengo apellidos";         //intentamos crearla
echo "<h3> Muestro el valor del nuevo atributo:</h3>";
echo "Apellidos: " . $obj->apellidos . "<br/>";
echo "<hr>";

echo "<h3> Muestro la lista de propiedades del objeto con  "
    . "get_object_vars() (solo mostrará las públicas):</h3>";
echo "<p>La propiedad se ha creado en el objeto y es pública</p>";
$aPropiedades2 = get_object_vars($obj);
foreach ($aPropiedades2 as $nombre => $valor) {
    echo "nombre de la propiedad: $nombre., valor: $valor<br/>";
}
echo "<hr>";

echo "<h3> Muestro la lista de propiedades del objeto con  "
    . "get_object_vars() pero mediente un método definido en la clase "
    . "(mostrará todas las propiedades de la clase ):</h3>";
echo "<p>La propiedad se ha creado en el objeto </p>";
$obj->getObjectPropiedades();
echo "<hr>";

echo "<h3> Muestro la lista de propiedades de la clase con  "
    . "get_class_vars() pero mediente un método definido en la clase "
    . "(mostrará todas las propiedades de la clase ):</h3>";
echo "<p>La propiedad NO se ha creado en la clase </p>";
$obj->getClassPropiedades();
echo "<hr>";

?>