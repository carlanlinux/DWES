<?php


class BicyclePOO
{
    public const CATEGORIES = ['road', 'mountain', 'hybrid', 'crusier', 'city', 'BMX'];
    public const GENDERS = ['men', 'womens', 'unisex'];
    public const LBSCHANGERATE = 2.2046226218;
    protected const CONDITIONOPTIONS = [
        1 => 'Beat up',
        2 => 'Decent',
        3 => 'Good',
        4 => 'Great',
        5 => 'Like New'];

    public $brand;
    public $model;
    public $year;
    public $category;
    public $color;
    public $description;
    public $gender;
    public $price;

    protected $weight_kg;
    protected $condition_id;

    //Creamos el constructor y ponemos como parámetro un arary de argumentos
    public function __construct ($args = [])
    {
        /*        $this->brand = $args['brand'] ?? '';
                $this->model = $args['model'] ?? '';
                $this->year = $args['year'] ?? '';
                $this->category = $args['category'] ?? '';
                $this->color = $args['color'] ?? '';
                $this->description = $args['description'] ?? '';
                $this->gender = $args['gender'] ?? '';
                $this->price = $args['price'] ?? 0;
                $this->weight_kg = $args['weight_kg'] ?? 0.0;
                $this->condition_id = $args['condition_id'] ?? 3;*/

        //Se puede simplificar haciendo un foreach, se podrían setear todas las privadas y las protegidas
        foreach ($args as $key => $value) {
            if (property_exists($this, $key)) $this->$key = $value;
        }

    }

    /**
     * @return mixed
     */
    public function getWeightKg ()
    {
        return number_format($this->weight_kg, 2);
    }

    /**
     * @param mixed $weight_kg
     */
    public function setWeightKg ($weight_kg): void
    {
        $this->weight_kg = floatval($weight_kg);
    }

    public function setWeightLbs ($lbs)
    {
        $this->weight_kg = floatval($lbs) / self::LBSCHANGERATE;
    }

    public function getWeightLbs ()
    {
        return number_format(floatval($this->weight_kg * self::LBSCHANGERATE), 2) . " lbs";

    }

    public function condition ()
    {
        // Si la condición es mayor que 0
        if ($this->condition_id > 0) {
            //devolvemos el valor del array asociativo conditionnoptions, que tenga la clave que tenemos guardada en el
            // atributo condition_id
            return self::CONDITIONOPTIONS[$this->condition_id];
        } else {
            return "Unknown";
        }
    }

    //Se podría hacer así qpero queda mejor usando la función de arriba
    /*public function condition(){
        $conditionString = '';
        switch ($this->condition_id){
            case 1: $conditionString = self::CONDITIONOPTIONS[1]; break;
            case 2: $conditionString = self::CONDITIONOPTIONS[2]; break;
            case 3: $conditionString = self::CONDITIONOPTIONS[3]; break;
            case 4: $conditionString = self::CONDITIONOPTIONS[4]; break;
            case 5: $conditionString = self::CONDITIONOPTIONS[5]; break;
        }
        return $conditionString;
    }*/

}