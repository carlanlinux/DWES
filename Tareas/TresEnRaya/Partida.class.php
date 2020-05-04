<?php


class Partida
{
    //Creamos la propiedad tabla la clase Usuario, que es la de la bd, por lo que lo ponemos protected y estática, ya que
    // es compartida por todas las instancias
    private const NUM_FILAS = 3;
    private const NUM_COLUMNAS = 3;
    static protected $table_name = 'partida';
    static protected $database;
    public $partida;
    public $tablero = '{"1_1":0,"1_2":0,"1_3":0,"2_1":0,"2_2":0,"2_3":0,"3_1":0,"3_2":0,"3_3":0}';
    public $num_movimientos = 0;
    public $terminada = 0;
    private $id_usuario;


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

    public static function guardar_partida (Partida $objeto_partida)
    {
        $sql = "INSERT INTO " . self::$table_name . "(";
        $sql .= "id_usuario, tablero, num_movimientos, terminada";
        $sql .= ") VALUES ('";
        $sql .= $objeto_partida->id_usuario . "', ";
        $sql .= "'" . $objeto_partida->tablero . "', ";
        $sql .= "'" . $objeto_partida->terminada . "', ";
        $sql .= "'" . $objeto_partida->num_movimientos;
        $sql .= "')";

        $result = self::$database->query($sql);
        if ($result) {
            $objeto_partida->partida = self::$database->insert_id;
        }
        return $objeto_partida;
    }

    public static function actualizar_partida (Partida $partida)
    {
        //UPDATE usuario SET partida = value WHERE id= value
        $sql = "UPDATE " . self::$table_name;
        $sql .= " SET tablero ='" . $partida->tablero;
        $sql .= "', terminada=" . $partida->terminada;
        $sql .= " WHERE ";
        $sql .= "partida=";
        $sql .= $partida->partida;
        $result = self::$database->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public static function buscar_partida (Usuario $usuario)
    {
        $sql = "SELECT * from " . static::$table_name;
        $sql .= " WHERE partida=" . $usuario->partida;
        $result = self::$database->query($sql);
        $partida = $result->fetch_assoc();
        if ($usuario->partida == $partida['partida']) {
            return self::instanciar($partida);
        }
        return null;
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

    public function crearTablero ()
    {
        $tablero = json_decode($this->tablero);
        $board = "<table id='board'>";
        for ($i = 1; $i <= self::NUM_FILAS; $i++) {
            $board .= "<tr id='fila_{$i}'>";
            for ($j = 1; $j <= self::NUM_COLUMNAS; $j++) {
                $board .= "<td id='{$i}_{$j}'>";
                //Guardamos el contenido del json que tiene las fichas de los usuarios reocrriendo el json
                $posicion = $tablero->{"{$i}_{$j}"};
                //Hacemos un case y se pintan en el tablero las imágenes de cada jugador.
                if ($posicion == 0) $board .= "<img class ='vacio' src='vacio.png' alt='Vacio'>";
                if ($posicion == 1) $board .= "<img class ='jugador' src='circle-Jug.png' alt='Ficha_Jugador'>";
                if ($posicion == 2) $board .= "<img class = 'maquina'src='cross-Maq.png' alt='Ficha_Máquina'>";
                $board .= "</td>";
            }
            $board .= "</tr>";
        }
        $board .= "</table>";
        return $board;
    }

    //Ejecutamos la jugada del jugador enviando la posición incial y la final
    public function jugar_jugador ($posicion_inicial, $posicion_final)
    {
        //Accedemos al tablero, decodificando el JSON para que podamos acceder a él como objeto introduciendo las posiciones
        // del tablero y asignando el valor correspondiente
        $objeto = json_decode($this->tablero);
        $objeto->{$posicion_inicial} = 0;
        $objeto->{$posicion_final} = 1;
        $this->tablero = json_encode($objeto);
    }

    public function jugar_maquina ()
    {
        $posiciones_libres = [];
        $posiciones_ocupadas_maquina = [];
        $contador_libres = 0;
        $contador_ocupadas_maquina = 0;
        for ($i = 1; $i <= self::NUM_FILAS; $i++) {
            for ($j = 1; $j <= self::NUM_COLUMNAS; $j++) {
                $valor = json_decode($this->tablero)->{"{$i}_{$j}"};
                if ($valor == 0) {
                    $posiciones_libres[$contador_libres] = "{$i}_{$j}";
                    $contador_libres++;
                }
                if ($valor == 2) {
                    $posiciones_ocupadas_maquina[$contador_ocupadas_maquina] = "{$i}_{$j}";
                    $contador_ocupadas_maquina++;
                }
            }
        }
        //Creamos un entero random de 0 a contador -1 (porque en la última iteración  le añadimos un ++ extra a contador que no sirve) PHP7
        $random_posicion_nueva = random_int(0, $contador_libres - 1);
        //Si tenemos más de 3 posiciones libres en el tablero quiere decir que no se han desplegado las 3 fichas de cada
        // jugador por lo que sólo necesitamos un random para saber en qué casilla poner la ficha.
        if ($contador_libres > 3) {
            //** 1.Creamos un objeto donde guardamos el JSON decoded del tablero */
            //** 2.Metemos la posición que nos ha salido en el random de todas las posiciones libres del JSON */
            //** 3.Guardamos en la propiedad de la clase tablero el json encoded de nuevo */
            $objeto = json_decode($this->tablero);
            $objeto->{$posiciones_libres[$random_posicion_nueva]} = 2;
            $this->tablero = json_encode($objeto);
        } else {
            $random_posicion_quitar = random_int(0, $contador_ocupadas_maquina - 1);
            $objeto = json_decode($this->tablero);
            //Cogemos las posiciones ocupadas por la máquina, seleccionamos la que nos devuelve el random que es la que
            // vamos a mover y la igualamos a 0 para dejarla en blanco en el tablero
            $objeto->{$posiciones_ocupadas_maquina[$random_posicion_quitar]} = 0;
            $objeto->{$posiciones_libres[$random_posicion_nueva]} = 2;
            $this->tablero = json_encode($objeto);
        }


    }

    //Probamos comprobando filas, columnas y diagonales, devolvemos 0 si sigue la partida.
    public function comprobar_victoria ()
    {
        //Comprobamos las filas y decodificamos el JSON para su tratamiento
        $tablero = json_decode($this->tablero);
        $comprobacion = "";
        //Hacemos un primer bucle para fijar el número de la fila y un segundo bucle para movernos por las columnas
        //Se crea un string que se va concatenando y si tiene todos 1 gana jugador y si tiene todos 2 gana máquina.
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                $comprobacion .= $tablero->{"{$i}_{$j}"};
                if ($comprobacion === "111") return 1;
                if ($comprobacion === "222") return 2;
                $comprobacion .= "";
            }
            $comprobacion = "";
        }

        //Comprobamos las columnas
        $comprobacion = "";
        //Se recorre el bucle a la inversa (cambiando en el json la j por la i y biceversa.
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                $comprobacion .= $tablero->{"{$j}_{$i}"};
                if ($comprobacion === "111") return 1;
                if ($comprobacion === "222") return 2;
                $comprobacion .= "";
            }
            $comprobacion = "";
        }
        //Comprobamos las diagonal \
        $comprobacion = "";
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                //si tanto la i como la j valen lo mismo es que son la diagona, y entonces realizamos la comprobación
                if ($i === $j) {
                    $comprobacion .= $tablero->{"{$i}_{$j}"};
                    if ($comprobacion === "111") return 1;
                    if ($comprobacion === "222") return 2;
                    $comprobacion .= "";
                }
            }
        }

        //Comprobamos las diagonal /
        //Concatenamos el valor de las posiciones del la diagonal del tablero y comprobamos si es combinación ganadora
        $comprobacion = $tablero->{"3_1"} . $tablero->{"2_2"} . $tablero->{"1_3"};
        if ($comprobacion === "111") return 1;
        if ($comprobacion === "222") return 2;

        //Si no se encuantra combinacón devolvemos 0 porque nadie ha ganado.
        return 0;
    }


}