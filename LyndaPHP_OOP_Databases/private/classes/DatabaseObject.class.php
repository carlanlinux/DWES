<?php


class DatabaseObject
{
    //Todos los hojos van a tener una conexión a la base de datos, el nombre de la tabla, columnas y tablas
    static protected $database;
    static protected $table_name = "";
    static protected $columns = [];
    //Ponemos los errores públicos y no estáticos porque tienen qeu ser accesibles desde todas las clases y cada una t
    //endrá su error, no es el mimsmo para todos
    public $errors = [];

    public static function set_database ($database)
    {
        self::$database = $database;

    }

    public static function find_all ()
    {
        //Modificamos el nombre de la tabla que teníamos antes de bici por el del parámetro de la clase padre, table_name
        //OJO!! Self selecciona la de la clase actual(esta) que estaría vacía, como queremos el de la clase que se instancia en tiempo de ejecución
        //Tenemos que usar static!!!!! De est forma quien llama al método es quien le dará el valor a esta table name.
        $sql = "SELECT * FROM " . static::$table_name;
        return static::find_sql($sql);
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
            //OJO!! STATIC!! Tenemos que utlizar static cada vez que instanciemos para que se instancie una clase del mismo tipo que la llama.
            $object_array[] = static::instantiate($record);
        }
        return $object_array;

        //Liberamos los datos del fectch.
        $record->free();
    }

    //Estos son métodos estáticos porque aún no tenemos la instancia (el objeto) creado y queremos acceder a ellos.

    protected static function instantiate ($records)
    {
        //Instanciamos un objeto de la propia clase
        $object = new static();
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

    public static function find_by_id ($id)
    {
        //Dividimos la query en dos partes para poder meter el id entre comillas simples y aplicando primero el método
        //escape_string para evitar sql injections y convertir el id en string de forma segura.
        $sql = "SELECT * FROM " . static::$table_name;
        $sql .= " WHERE id='" . self::$database->escape_string($id) . "'";
        //como en el anterior nos devovlerá un array de objetos sólo que como en la SQL filtramos por uno, ese array
        // contendrá un único objeto
        $obj_array = static::find_sql($sql);
        //Si al array no está vacío queremos devolver sólo el array que se encuentra en la primera posición, eso lo
        // hacemos usando el método array_shift.
        if (!empty($obj_array)) {
            return array_shift($obj_array);
            //si no lo encuentra, devolvemos falso.
        } else {
            return false;
        }
    }

    //Creamos la función de validación, que se hará un override en cada clase.

    public function save ()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->create();
        }

    }

    protected function update ()
    {
        $this->validate();
        if (!empty($this->errors)) return false;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach ($attributes as $key => $value) {
            //Ojo, poner el iconito del array al rellenar, sino peta porque no lo reconoce como Array.
            $attribute_pairs[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;

    }

    //Ejectuamos la función sanitized para que nos devuelva los string ya con las string escapadas
    //Creamos un array que es donde guardaremos los clave valor del array que se usará en la query
    //nos recorremos el array atributos y le damos el formato que necesitmos para la query: 'columna'='valor'
    //Juntamos todas las posiciones del array separadas por ", " y lo juntamos con el ID del objeto tenemos escapado
    // y ejecutmos la query SQL

    protected function validate ()
    {
        $this->errors = [];

        //Add custom validations
        return $this->errors;
    }

    //Con esto le damos a gurdar, y si tiene ID se editará porque lo reconoceremo en la base de datos, y si no tiene ID,
    // sabemos que hay quecrearlo así crear y update podemos ponerlos en protected para que sólo se accedan desde este método

    protected function sanitized_attributes ()
    {
        $sanitized = [];
        //Nos recorremos todos los atributos y le aplicamos la función escape_string que viene con MYSQLI para que nos
        // devuelva lso string escapados
        foreach ($this->attributes() as $key => $value) {
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }

    public function attributes ()
    {
        $attributes = [];
        //Aquello que referencie a la clase cambiarse por static
        foreach (static::$db_columns as $column) {
            //Comprobamos que si no viene el atributo ID, que es un atributo de las columnas de la Base de datos,
            // no haga nada y siga con el siguiente ya que ese se asigna automáticamente en la BD.
            if ($column == 'id') continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }
    //Propiedades que tiene la base de datos excluyendo ID
    //Aquí rescatamos los atributos del objeto y lo metemos creando un array asociativo deandole el valor de cada
    // columna con los atributos de la instancia y devolvemos este array.

    protected function create ()
    {
        $this->validate();
        if (!empty($this->errors)) return false;
        //Guardamos los artibutos de la BD llamando al método atributos y nos devuelve el array asociativo
        $atrributes = $this->sanitized_attributes();
        //Creamos un string que será el que contenga la query en este caso la plantilla es. El orden no importa siempre
        // y cuando los valores se ordenen igual
        // INSERT INTO Tabla (columna, columna2) VALUES ('Valor1', Valor2);
        $sql = "INSERT INTO " . static::$table_name . " (";
        //Juntamos todas las clolumnas separada por comas para meterlo en la quiery SQL y decir a qué columnas debe ir cada valor.
        //$sql .= join(', ', self::$db_columns); esto lo cambiamos por la de abajo para que sea dinámica.
        // Juntmos todos las claves del array asociativo (que son las columnas) con un join y las sacamos con array_keys.
        $sql .= join(', ', array_keys($atrributes));
        $sql .= ") VALUES ('";
        //Juntamos spearado por comas y espacio todos los valores del array asociativo. Ojo con las comillas entre vada valor.
        //Hay que asegurarse que detras (con la primera, espacio y otra comilla antes de, siguiente valor para cumplir con el formato.
        $sql .= join("', '", array_values($atrributes));

        /*      Sustitutimos esto, con el método attributes
                $sql .= "'" . $this->brand . "', ";
                $sql .= "'" . $this->model . "', ";
                $sql .= "'" . $this->year . "', ";
                $sql .= "'" . $this->category . "', ";
                $sql .= "'" . $this->color . "', ";
                $sql .= "'" . $this->gender . "', ";
                $sql .= "'" . $this->price . "', ";
                $sql .= "'" . $this->weight_kg . "', ";
                $sql .= "'" . $this->condition_id . "', ";
                $sql .= "'" . $this->description . "'";*/

        $sql .= "')";


        //Creamosuna variable llamando a la clase su propiedad Database que ya tiene la conexión con la base de datos,
        // llamamos al método query y le enviamos SQL
        $result = self::$database->query($sql);
        if ($result) {
            //Esto nos devuelve cuál es la última id insertada, propiedad por defecto del objeto database
            $this->id = self::$database->insert_id;
        }

        //En un método de CRUD, el resultado que debe devolver es true o false en función de si ha tenido éxito o no.
        return $result;
    }

    //Vamos a preparar los datos antes de meterlo en la query SQL. Cremoa un array donde guardaremos los datos saneados

    public function merge_attributes ($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public function delete ()
    {
        $sql = "DELETE FROM bicycles ";
        //Queremos escapar el valor por si acaso
        $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "'";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;

        //Después de borrar en la base de datos, deberíamos borrar la instancia del objeto que todavía existe.
        //Esto es util para avisar con un mensaje que X ha sido borrado
        //echo $user->first_name . "was deleted";
        //Pero hay que tener cuidado ya que no opdemos llamar al método update después de haberlo borrado.
    }


}