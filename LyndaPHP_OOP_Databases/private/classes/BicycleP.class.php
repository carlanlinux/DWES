<?php


class BicycleP
{
    // ------- START OF ACTIVE RECORD CODE --------

    //Crearmos una propiedad estática para que todas las instancias puedan acceder a la conexión de la base de datos.
    public const CATEGORIES = ['road', 'mountain', 'hybrid', 'crusier', 'city', 'BMX'];

    //Como es protected, creamos una función para que pasandole la base de datos desde el inicializador, pueda llevarla
    // a la variable de clase
    public const GENDERS = ['men', 'womens', 'unisex'];

    //Creamos un método para que nos devuelva todos los datos de la base de datos, donde ponemos la query y devolvemos
    // la query. Este tipo de métodos se tendrán que ir creando para cada una de los tipos de query. La idea es tener
    // todo lo relacionado con base de datos aquí en la clase objeto.
    public const LBSCHANGERATE = 2.2046226218;
    protected const CONDITIONOPTIONS = [
        1 => 'Beat up',
        2 => 'Decent',
        3 => 'Good',
        4 => 'Great',
        5 => 'Like New'];

    //Buscamos en la base de datos y esperamos que nos deuvelva todos los objetos de la tabla en un array de objetos
    // llamando al método find_sql y pasando la query como argumento.
    static protected $database;

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

    public static function set_database ($database)
    {
        self::$database = $database;

    }

    public static function find_all ()
    {
        $sql = "SELECT * FROM bicycles";
        return self::find_sql($sql);
    }

    public static function find_sql ($sql)
    {
        $result = self::$database->query($sql);
        //Comprobamos que no haya errores viendo si resultado tiene algún valor
        if (!$result) exit("Database query failed");
        //Antes de devolver los resultados lo que tenemos que hacer es convertir los resultados en objetos. No queremos
        // los resultados sino los objetos, un array de objetos
        $object_array = [];
        //Mientras que haya filas por sacar, las metes en un array asociativo.
        while ($record = $result->fetch_assoc()) {
            //Llamamos al método para crear el objeto pasándole los datos de la fila que se obtiene en cada bucle y nos devuelve
            //el objeto ya instanciado que se incluye en el array de objetos.
            $object_array[] = self::instantiate($record);
        }
        return $object_array;

        //Liberamos los datos del fectch.
        $record->free();
    }

    protected static function instantiate ($records)
    {
        //Instanciamos un objeto de la propia clase
        $object = new self();
        //Could manually assign values and propierties
        //But automatic assignment se puede hacer fácil y reusable. Con un for each nos recorremos el array asociativo
        // como propiedad y valor entonces si la propiedad existe
        foreach ($records as $property => $value) {
            //Si en el objeto (param1) existe la propiedad (param2) entonces le das el valor de value a la propiedad del objeto.
            if (property_exists($object, $property)) $object->$property = $value;
        }
        //Devolvemos el objeto
        return $object;
    }

    //Creamos el constructor y ponemos como parámetro un arary de argumentos

    public static function find_by_id ($id)
    {
        //Dividimos la query en dos partes para poder meter el id entre comillas simples y aplicando primero el método
        //escape_string para evitar sql injections y convertir el id en string de forma segura.
        $sql = "SELECT * FROM bicycles ";
        $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
        //como en el anterior nos devovlerá un array de objetos sólo que como en la SQL filtramos por uno, ese array
        // contendrá un único objeto
        $obj_array = self::find_sql($sql);
        //Si al array no está vacío queremos devolver sólo el array que se encuentra en la primera posición, eso lo
        // hacemos usando el método array_shift.
        if (!empty($obj_array)) {
            return array_shift($obj_array);
            //si no lo encuentra, devolvemos falso.
        } else {
            return false;
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