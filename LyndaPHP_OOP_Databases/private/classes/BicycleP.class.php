<?php


class BicycleP extends DatabaseObject
{
    //Creamos el objeto dabase que sólo lo van a necesitar los objetos instanciados de la clase, por lo que lo ponemos protected
    static protected $table_name = 'bicycles';
    //Creamos la lista de las columnas de la base de datos para poderlo reutilizar a lo largo del código
    static protected $db_columns = [
        'brand',
        'model',
        'year',
        'category',
        'color',
        'gender',
        'price',
        'weight_kg',
        'condition_id',
        'description'
    ];

    //Crearmos una propiedad estática para que todas las instancias puedan acceder a la conexión de la base de datos.
    public const CATEGORIES = ['road', 'mountain', 'hybrid', 'crusier', 'city', 'BMX'];

    //Como es protected, creamos una función para que pasandole la base de datos desde el inicializador, pueda llevarla
    // a la variable de clase
    public const GENDERS = ['men', 'womens', 'unisex'];

    //Creamos un método para que nos devuelva todos los datos de la base de datos, donde ponemos la query y devolvemos
    // la query. Este tipo de métodos se tendrán que ir creando para cada una de los tipos de query. La idea es tener
    // todo lo relacionado con base de datos aquí en la clase objeto.
    public const LBSCHANGERATE = 2.2046226218;
    public const CONDITION_OPTIONS = [
        1 => 'Beat up',
        2 => 'Decent',
        3 => 'Good',
        4 => 'Great',
        5 => 'Like New'];

    //Buscamos en la base de datos y esperamos que nos deuvelva todos los objetos de la tabla en un array de objetos
    // llamando al método find_sql y pasando la query como argumento.

    //Buscamos en la base de datos por id y esperamos que nos devuelva un único objeto.
    public $id;

    // ------- END OF ACTIVE RECORD CODE --------
    public $brand;
    public $model;
    public $year;
    public $category;

    //las propiedades tienen que ser las mismas que las que tiene el objeto en la base de datos.
    public $color;
    public $description;
    public $gender;
    public $price;
    protected $weight_kg;
    protected $condition_id;


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

    //Estos son métodos estáticos porque aún no tenemos la instancia (el objeto) creado y queremos acceder a ellos.

    //Función para devolver el nombre del producto con marca, modelo y año
    public function name ()
    {
        return "{$this->brand} {$this->model} {$this->year}";
    }

    protected function validate ()
    {
        $this->errors = [];

        if (is_blank($this->brand)) {
            $this->errors[] = "Brand cannot be blank.";
        }
        if (is_blank($this->model)) {
            $this->errors[] = "Model cannot be blank.";
        }
        return $this->errors;
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
            return self::CONDITION_OPTIONS[$this->condition_id];
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