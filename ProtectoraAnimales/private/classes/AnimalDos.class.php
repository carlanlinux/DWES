<?php



class AnimalDos extends Crud
{
    private int $id;
    private string $nombre;
    private string $especie;
    private string $raza;
    private string $genero;
    private string $color;
    private int $edad;
    private $conexion;
    private const TABLA = "animal";

    public function __construct ($nombre, $especie, $raza, $genero, $color, int $edad)
    {
        $this->conexion = parent::__construct(self::TABLA);
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->raza = $raza;
        $this->genero = $genero;
        $this->color = $color;
        $this->edad = $edad;
        $this->crear();
    }

    public function __set ($propiedad, $valor)
    {
        $this->$propiedad = $valor;
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

    protected function crear () {
            try {
                //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD
                $sql = "INSERT INTO ? (nombre, especie, raza, genero, color, edad) VALUES (?, ?, ?, ?, ?, ?)";
                //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
                $stmt = $this->conexion->prepare($sql);
                //Bind value para calculos y expresiones BiddPAram para variables
                // //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
                //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
                // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
                //Ejecutamos la consulta preparada
                $affected = $stmt->execute(array(self::TABLA,$this->nombre,$this->especie, $this->raza,
                    $this->genero, $this->color, $this->edad));
                if ($affected) {
                    //Devuelve el último Id que se ha insertado
                    echo $affected . " row inserted with ID " . $this->id = $this->conexion->lastInsertId();
                } else {
                    echo "Error al introducir nuevo animal";
                }
            } catch (Exception $e) {
                return $error = $e->getMessage();
            }
            if (isset($error)) {
                return $error;
            }
    }

    protected function actualizar ()
    {
        try {
            //Query a la base de datos para actualizar
            $sql = "UPDATE :table
                    SET nombre = :nombre, especie= :especie, raza = :raza, genero = :genero, color = :color, edad = :edad
                    WHERE id = :id LIMIT 1";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':table', self::TABLA, PDO::PARAM_STR);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindParam(':especie', $this->apellido, PDO::PARAM_STR);
            $stmt->bindParam(':raza', $this->sexo, PDO::PARAM_STR);
            $stmt->bindParam(':genero', $this->direccion, PDO::PARAM_STR);
            $stmt->bindParam(':color', $this->color, PDO::PARAM_STR);
            $stmt->bindParam(':edad', $this->direccion, PDO::PARAM_INT);

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