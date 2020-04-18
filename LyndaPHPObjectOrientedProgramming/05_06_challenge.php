<?php

class Bicycle {

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  protected $weight_kg = 0.0;
  protected static $wheels = 2;
  public static $instance_count = 0;
  const CATEGORIES = ['Road','Mountain','Hybrid','Cruiser','City','BMX'];
  public $catogery;

  public static function create(){
    //Añadimos una al contador de instancias
    self::$instance_count++;
    //Para saber cuál será la clase que llama al metodo y así crear ese objeto usamos get_called_class en tiempo de
    // ejecución
    $class_name = get_called_class();
    $obj = $class_name;

    //Se podría también poner de esta forma, en el que hacemos referencia a objecto actual:
    //$obj = new static u $obj= new self
    return new $obj;
  }

  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public static function wheel_details() {
    //OJO: Si implementamos usando Static usamos los late static bindings y así lo llamemos desde la padre o la hija
    // siempre hará referencia a la clase que lo llama.
    $wheel_string = static::$wheels == 1 ? "1 wheel" : static::$wheels. " wheels";
    return "It has " . $wheel_string . ".";
  }

  public function weight_kg() {
    return $this->weight_kg . ' kg';
  }

  public function set_weight_kg($value) {
    $this->weight_kg = floatval($value);
  }

  public function weight_lbs() {
    $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
    return $weight_lbs . ' lbs';
  }

  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

}

class Unicycle extends Bicycle {
  // visibility must match property being overridden
  protected static $wheels = 2;

  public function bug_test() {
    return $this->weight_kg;
  }

  public function name() {
    return "El modelo es" . $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public function set_weight_kg($value) {

    $value > 100 ? $this->weight_kg = floatval($value) : parent::set_weight_kg($value);
  }

}

$trek = new Bicycle;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';

echo "Biclycle count: " . Bicycle::$instance_count . '<br>';
echo "Unicyle count:" . Unicycle::$instance_count . '<br>';

$bike = Bicycle::create();
$uni = Unicycle::create();

echo "Biclycle count: " . Bicycle::$instance_count . '<br>';
echo "Unicyle count:" . Unicycle::$instance_count . '<br>';

echo "<hr>";
echo 'Categories: ', implode(",", Bicycle::CATEGORIES) . "<br>";
$trek->catogery = Bicycle::CATEGORIES[0];
echo "Category: " . $trek->catogery;
echo "<hr>";

?>
