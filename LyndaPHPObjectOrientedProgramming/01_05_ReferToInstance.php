<?php
class Student {
    var $first_name;
    var $last_name;
    var $country = "none";

    function say_hello(){
        return "hello world";
    }

    function full__name(){
        return $this->first_name . " " .$this->last_name;
    }

}

$student1 = new Student();
$student1->first_name = "Luci";
$student1->last_name = "Ricardo";

$student2 = new Student();
$student2->first_name = "Pepe";
$student2->last_name = "Rodriguez";

echo $student1->first_name . " " . $student1->last_name . "<br>";
echo $student2->first_name . " " . $student2->last_name . "<br>";

echo $student1->full__name() . "<br>";
echo $student2->full__name() . "<br>";

//Devuelve un array con los datos de los metodos de la instancia, por eso los mostramos separados por coma
$class_methods = get_class_methods($student1);
echo "Class methods: " . implode(',', $class_methods) . "<br>";

//Comprobamos si la propiedad existe en la clase
if (method_exists('Student','say_hello')){
    echo "Method say_hello() exists in Student class.<br>";
} else {
    echo "Method say_hello() does not in Student class.<br>";
}