<?php
class Bycile {
     public $brand = "";
     public $model;
     public $year;
     public $description;
     public $weight_kg;
     const CONVERSION = 2.2046226218;


    function name(){
        return $this->brand . " " . $this->model . " " . $this->year . ".<br>";

    }
    function weight_lbs(){
        //De esta forma nos aseguramos que siempre vamos a meter un float
        return floatval($this->weight_kg * self::CONVERSION);
    }
    //Usamos floatval paa asegurarnos que se trata de un floar
    function set_weight_lbs($lbs){
        $this->weight_kg = floatval($lbs) / self::CONVERSION;

    }

}

$bici1 = new Bycile();
$bici1->brand = "BH";
$bici1->model = "Turbo";
$bici1->year = "2020";
$bici1->description = "Superpower bike";
$bici1->weight_kg = "3";

echo $bici1->name(). "<br>";
echo $bici1->weight_lbs(). "<br>";
$bici1->set_weight_lbs(10);
echo $bici1->weight_kg. "<br>";
echo $bici1->weight_lbs() . "<br>";


