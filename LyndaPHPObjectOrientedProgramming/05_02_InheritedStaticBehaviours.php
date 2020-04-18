<?php
class Student {
    public static $grades = ['Fishman', 'Sophomore','Junior','Senior'];
    private static $total_students = 0;

    public static function motto(){
        return "To learn PHP OOP!";
    }

    public static function count(){
        return self::$total_students;
    }

    public static function add_Student(){
        self::$total_students++;
    }

}

echo Student::$grades[0] . "<br>";
echo Student::motto() . "<br>";
echo Student::count() . "<br>";;
Student::add_Student();
echo Student::count() . "<br>";;

//Static properties and methods are inherited

class PartTimeStudent extends Student{

}

echo PartTimeStudent::$grades[0] . "<br>";
echo PartTimeStudent::motto() . "<br>";

//Changes are shared too!
PartTimeStudent::$grades[] = "Alumni";
echo implode(',', Student::$grades);

Student::add_Student();
Student::add_Student();
Student::add_Student();
Student::add_Student();
PartTimeStudent::add_Student();
PartTimeStudent::add_Student();
PartTimeStudent::add_Student();
PartTimeStudent::add_Student();

echo Student::count() . "<br>";
echo PartTimeStudent::count() . "<br>";


//
