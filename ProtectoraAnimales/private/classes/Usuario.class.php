<?php


class Usuario extends Crud
{
    //Array que servirá para rellenar las propiedades de la clase con el método mágico set
    protected $data = array();
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;
    private $edad;
    private $conexion;
    private const TABLA = "usuarios";

    public function __construct ()
    {
        $this->conexion = parent::__construct(self::TABLA);
    }

    public function __set ($name, $value)
    {
        //Rellenamos los parámetros que se nos pasen en las propiedades de la clase.
        $this->data[$name] = $value;
    }

    //Devolvemos el dato que se solicite
    public function __get ($propiedad)
    {
        if (property_exists(__CLASS__, $propiedad)) {
            return $this->$propiedad;
        } else
            return "método __get() NO existe el atributo '"
                . $propiedad . "'<br/>";
    }


    protected function crear ()
    {
        try {
            //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD
            $sql = "INSERT INTO :table (nombre, apellido, sexo, direccion, telefono)
                    VALUES (:nombre, :apellido, :sexo, :direccion, :telefono)";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':table', self::TABLA, PDO::PARAM_STR);
             $stmt->bindParam(':appelido', $this->apellido, PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $this->sexo, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $this->direccion, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $this->telefono, PDO::PARAM_STR);

            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
        if (isset($error)) {
            return $error;
        } else{
            //Devuelve el último Id que se ha insertado
            return $affected . " row inserted with ID " . $this->id = $this->conexion->lastInsertId();
        }

    }

    protected function actualizar ()
    {
        try {
            //Query a la base de datos para actualizar
            $sql = "UPDATE :table
                    SET nombre = :nombre, apellido= :apellido, sexo = :sexo, direcicon = :direccion, telefono = :telefono
                    WHERE id = :id LIMIT 1";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindParam(':appelido', $this->apellido, PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $this->sexo, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $this->direccion, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $this->telefono, PDO::PARAM_STR);

            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            //Devuelve el último Id que se ha

        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
        if (isset($error)) {
            return $error;
        } else{
            return $affected . " row updated with ID ";
        }

    }
}