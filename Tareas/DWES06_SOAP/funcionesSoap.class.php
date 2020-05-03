<?php
/**
 * @Class FuncionesSoap
 * Objetivo: tarea servicio con  WSDL
 */

class FuncionesSoap
{

    /**  Esta función recibirá como parámetro el código de un producto, y devolverá el PVP correspondiente al mismo.
     * @param string
     * @return int
     */
    public function getPVP ($cod)
    {
        $baseDatos = $this->conectar_db();
        $sql = "SELECT * FROM producto";
        $sql .= " WHERE cod='" . filter_var($cod, FILTER_SANITIZE_STRING) . "'";
        $resultados = $baseDatos->query($sql);
        if (!$resultados) exit("Database query failed");
        $row = $resultados->fetch_assoc();
        return $row['PVP'];

    }

    /** Función para establecer la conexión de la base de datos
     * @return mysqli
     */
    private function conectar_db ()
    {
        $conexion = new mysqli("localhost", "root", "root", "dwes");
        //Antes de devolver el objeto de la base de datos lo que hacemos es comprobar que ha ido bien llamando a otro método
        $this->confirmar_conexion_db($conexion);
        return $conexion;
    }

    private function confirmar_conexion_db ($conexion)
    {
        if ($conexion->connect_errno) {
            $mensaje = "La conexión a la base de datos ha fallado";
            $mensaje -= $conexion->connect_error;
            $mensaje .= " (" . $conexion->connect_error . ")";
            exit($mensaje);
        }
    }

    /**
     * Esta función recibirá dos parámetros: el código de un producto y el código de una tienda. Devolverá el stock
     * existente en dicha tienda del producto.
     * @param string
     * @param int
     * @return int
     */
    public function getStock ($id, $tienda)
    {
        $baseDatos = $this->conectar_db();
        $sql = "SELECT * FROM stock";
        $sql .= " WHERE producto='" . filter_var($id, FILTER_SANITIZE_STRING);
        $sql .= "' AND tienda=" . filter_var($tienda, FILTER_SANITIZE_NUMBER_INT);
        $resultados = $baseDatos->query($sql);
        if (!$resultados) exit("Database query failed");
        $row = $resultados->fetch_assoc();
        $this->desconectar_db($baseDatos);
        return $row['unidades'];

    }


    private function desconectar_db ($conexion)
    {
        if (isset($conexion)) $conexion->close();
    }

    /**
     * No recibe parámetros y devuelve un array con los códigos de todas las familias existentes.
     * @return array
     */
    public function getFamilias ()
    {
        $baseDatos = $this->conectar_db();
        $sql = "SELECT cod FROM familia";
        // contendrá un único objeto
        $resultados = $baseDatos->query($sql);
        if (!$resultados) exit("Database query failed");
        $array = $resultados->fetch_all();
        $this->desconectar_db($baseDatos);
        return $array;

    }

    /** Función para desconectar de la base de datos
     */
//Desconectar de la BD
    /** Recibe como parámetro el código de una familia y devuelve un array con los códigos de todos los
     * productos de esa familia.
     * @param string
     * @return array
     */
    public function getProductosFamilias ($codFamilia)
    {
        $baseDatos = $this->conectar_db();
        $sql = "SELECT cod FROM producto";
        $sql .= " WHERE familia='" . filter_var($codFamilia, FILTER_SANITIZE_STRING) . "'";
        $resultados = $baseDatos->query($sql);
        if (!$resultados) exit("Database query failed");
        $array = $resultados->fetch_all();
        $this->desconectar_db($baseDatos);
        return $array;

    }


}