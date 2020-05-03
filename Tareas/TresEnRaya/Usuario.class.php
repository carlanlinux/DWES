<?php


class Usuario
{
    //Creamos la propiedad tabla la clase Usuario, que es la de la bd, por lo que lo ponemos protected y estática, ya que
    // es compartida por todas las instancias
    static protected $table_name = 'usuario';
    static protected $database;

    //Creamos un espejo de la tabla de la base de datos en propiedades pero incluyendo password y confirmación de la
    // contraseña además de poniendo el hash protejido ya que sólo debe tener acceso esta clase.
    public $nombre_usuario;
    public $partidas_totales = 0;
    public $partidas_ganadas = 0;
    //Campos auto increment de la base de datos
    public $id;
    public $partida;


    /// CONSTRUCTOR //
    //Le pasamos un objeto array como argumentos para construir el objeto
    public function __construct ($args = [])
    {
        foreach ($args as $key => $value) {
            //Ojo, el this ponerlo siempre con $ - Si la propiedad existe, añade el valor.
            if (property_exists($this, $key)) $this->$key = $value;
        }
    }

    ///*********************** INSTANCIAR OBJETO UNA VEZ RECIBO 1 REGISTRO DE LA BASE DE DATOS ******************** //

    public static function set_database ($database)
    {
        self::$database = $database;
    }

    //Función estática y pública para que se le pueda llamar desde cualquier clase para pasarle la base de datos

    public static function guardar_usuario ($objeto_usuario)
    {
        //Creamos un string que será el que contenga la query en este caso la plantilla es. El orden no importa siempre
        // y cuando los valores se ordenen igual
        // INSERT INTO Tabla (columna, columna2) VALUES ('Valor1', Valor2);
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= "nombre_usuario, partidas_totales, partidas_ganadas";
        $sql .= ") VALUES ('";
        $sql .= $objeto_usuario->nombre_usuario . "', ";
        $sql .= "'" . $objeto_usuario->partidas_totales . "', ";
        $sql .= "'" . $objeto_usuario->partidas_ganadas;
        $sql .= "')";

        //Creamos una variable llamando a la clase su propiedad Database que ya tiene la conexión con la base de datos,
        // llamamos al método query y le enviamos SQL
        $result = self::$database->query($sql);
        if ($result) {
            //Esto nos devuelve cuál es la última id insertada, propiedad por defecto del objeto database
            $objeto_usuario->id = self::$database->insert_id;
        }
        //Devolvemos el objeto una vez guardado en la base de datos
        return $objeto_usuario;
    }

    //Guardamos usuario en la base de datos

    public static function buscar_usuario ($nombre_usuario)
    {
        {
            $sql = "SELECT * from " . static::$table_name;
            $sql .= " WHERE nombre_usuario='" . filter_var($nombre_usuario, FILTER_SANITIZE_STRING) . "'";
            $result = self::$database->query($sql);
            $usuario = $result->fetch_assoc();
            if ($nombre_usuario == $usuario['nombre_usuario']) {
                return self::instanciar($usuario);
            }
            return null;
        }
    }

    protected static function instanciar ($records)
    {
        //Instanciamos un objeto de la propia clase
        $object = new static();
        // como propiedad y valor entonces si la propiedad existe
        foreach ($records as $property => $value) {
            //Si en el objeto (param1) existe la propiedad (param2) entonces le das el valor de value a la propiedad del objeto.
            if (property_exists($object, $property)) $object->$property = $value;
        }
        //Devolvemos el objeto
        return $object;
    }


    //*********   BUSCAR USUARIO EN LA BASE DE DATOS ************************
    //Buscamos si existe el usuario con ese nombre y lo devolvemos en forma de objeto Usuario si no lo encuentra devuelve null

    public static function actualizar_usuario (Usuario $usuario)
    {
        //UPDATE usuario SET partida = value WHERE id= value
        $sql = "UPDATE " . self::$table_name;
        $sql .= " SET partidas_totales =" . $usuario->partidas_totales;
        $sql .= ", partidas_ganadas=" . $usuario->partidas_ganadas;
        $sql .= " WHERE ";
        $sql .= "id=";
        $sql .= $usuario->id;
        $result = self::$database->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public function guardar_usuariov1 ()
    {
        //Creamos un string que será el que contenga la query en este caso la plantilla es. El orden no importa siempre
        // y cuando los valores se ordenen igual
        // INSERT INTO Tabla (columna, columna2) VALUES ('Valor1', Valor2);
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= "nombre_usuario, partidas_totales, partidas_ganadas";
        $sql .= ") VALUES ('";
        $sql .= $this->nombre_usuario . "', ";
        $sql .= "'" . $this->partidas_totales . "', ";
        $sql .= "'" . $this->partidas_ganadas;
        $sql .= "')";

        //Creamos una variable llamando a la clase su propiedad Database que ya tiene la conexión con la base de datos,
        // llamamos al método query y le enviamos SQL
        $result = self::$database->query($sql);
        if ($result) {
            //Esto nos devuelve cuál es la última id insertada, propiedad por defecto del objeto database
            $this->id = self::$database->insert_id;
        }

        //$this->crear_partida();
        $this->insertar_partida();
        //En un método de CRUD, el resultado que debe devolver es true o false en función de si ha tenido éxito o no.
        return $result;
    }

    function insertar_partida ()
    {
        //UPDATE usuario SET partida = value WHERE id= value
        $sql = "UPDATE " . self::$table_name;
        $sql .= " SET partida=";
        $sql .= $this->partida;
        $sql .= " WHERE ";
        $sql .= "id=";
        $sql .= $this->id;
        $result = self::$database->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

}


