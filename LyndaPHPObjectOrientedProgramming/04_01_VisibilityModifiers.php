<?php
class Student {
    public $first_name;
    public $last_name;
    public $country = "none";
    protected $registrationId;
    private $tuition = 0.00;

    public function say_hello(){
        return "hello world";
    }

    public function full__name(){
        return $this->first_name . " " .$this->last_name;
    }

    protected function say_family(){
        return "hello world";
    }

    private function hello_me(){
        return "hello world";
    }

}

class PartTimeStudent extends Student{
    public function hello_parent(){
        //Puedo llamar a ese método protegido desde el código de la clase hija pero no desde una instancia de esta clase.
        return $this->say_family();
    }
}

$student1 = new PartTimeStudent();
$student1->first_name = "Luci";
$student1->last_name = "Ricardo";

echo $student1->full__name();
echo $student1->say_hello();

echo $student1->hello_parent();
//echo $student1->hello_me();   Cant access private

