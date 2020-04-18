<?php
class Student {
    var $first_name;
    var $last_name;
    var $country = "none";

}

$student1 = new Student();
$student1->first_name = "Luci";
$student1->last_name = "Ricardo";

$student2 = new Student();
$student2->first_name = "Pepe";
$student2->last_name = "Rodriguez";

echo $student1->first_name . " " . $student1->last_name . "<br>";
echo $student2->first_name . " " . $student2->last_name . "<br>";

//Devuelve un array asociativo con los datos de las propiedades de la clase
$class_vars = get_class_vars('Student');
echo "Class vars:<br>";
echo "<pre>";
print_r($class_vars);
echo "</pre>";

//Devuelve un array asociativo con los datos de las propiedades de la instancia
$class_vars = get_object_vars($student1);
echo "Class vars:<br>";
echo "<pre>";
print_r($class_vars);
echo "</pre>";

//Comprobamos si la propiedad existe en la clase
if (property_exists('Student','first_name')){
    echo "Property first_name exists in Student class.<br>";
} else {
    echo "Property first_name does not in Student class.<br>";
}