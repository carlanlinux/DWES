<?php

class Bicycle {

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  protected $weight_kg = 0.0;
  protected $wheels = 2;

  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public function weight_lbs() {
    return floatval($this->weight_kg) * 2.2046226218;
  }

  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

  public function weheel_details(){
    //Aquí decimos que si el valor de weels es 1, asignamos a la variable el valor del true : y si no asignamos el valor
    // que contenga el atributo de la clase.
    $wheel_string = $this->wheels == 1 ? "1 wheel" : "{$this->wheels} wheels";
    return "It has " . $wheel_string . ".<br>";
  }

  public function set_weight_kg($kgs){
    //Nos aseguramos que sea un float
    $this->weight_kg = floatval($kgs);
  }

  public function weight_kg(){
    return $this->weight_kg . " kg";
  }
}

class Unicycle extends Bicycle {
  //OJO! Cuando se hace un override la visibilidad debe ser la misma que de la que viene
  protected $wheels = 1;

}

$trek = new Bicycle;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';
$trek->set_weight_kg(1);

$cd = new Bicycle;
$cd->brand = 'Cannondale';
$cd->model = 'Synapse';
$cd->year = '2016';
$cd->set_weight_kg(8);

echo $trek->name() . "<br />";
echo $cd->name() . "<br />";

echo $trek->weight_kg() . "<br />";
echo $trek->weight_lbs() . "<br />";
// notice that one is property, one is a method

$trek->set_weight_lbs(2);
echo $trek->weight_kg() . "<br />";
echo $trek->weight_lbs() . "<br />";

?>
