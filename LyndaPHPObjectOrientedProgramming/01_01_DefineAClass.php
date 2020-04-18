<?php
class StudentProfile {

}
//Almacenemos en una variable todas las clases que se han declarado
$classes = get_declared_classes();

//Separamos cada clase con una coma y un salto de línea.
echo "Classes: " . implode(",", $classes) . "<br>";

//Creamos un Array con nombres de clase que nos inventamos para hacer el check
$class_names = ['Product', 'StudentProfile', 'student'];

//Nos recorremos el array donde hemos metido las clases que queremos buscar
foreach ($class_names as $class_name) {
    //Llamamos a la función class exist que nos confirma si la clase existe con un true metiendo como parámetro el
    // nombre de la clase
    if (class_exists($class_name)) {
        //Si existe pintamos el nombre de la clase y decimos que está declarada y si no que no lo está.
        echo "{$class_name} is a declared class. <br>";
    } else {
        echo "{$class_name}its not a delcrare class. <br>";
    }
}
