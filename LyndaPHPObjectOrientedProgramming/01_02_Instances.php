<?php
class Student {

}

$student1 = new Student();
$student2 = new Student();
$student3 = new Student();

echo get_class($student1) . "<br>";

//Creamos un Array con nombres de clase que nos inventamos para hacer el check. Las clases no son case senitive
//Pero es mejor seguir las buenas prácticas.
$class_names = ['Product', 'Student', 'student'];

//Nos recorremos el array donde hemos metido las clases que queremos buscar
foreach ($class_names as $class_name) {
    //Con la función is a veos que la variable student1 corresponde a la clase que nos devuelve en el for each
    if (is_a($student1,$class_name)) {
        //Aquí nos dice a qué clase pertenece y a cuál no
        echo "student1 is a {$class_name}. <br>";
    } else {
        echo "student1 is not a {$class_name}. <br>";
    }
}