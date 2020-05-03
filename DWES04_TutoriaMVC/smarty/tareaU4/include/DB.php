<?php
require_once('Producto.php');
require_once('Ordenador.php');

class DB
{
    public static function obtieneProductos ()
    {
        $sql = "SELECT * FROM producto;";
        $resultado = self::ejecutaConsulta($sql);
        $productos = array();

        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $productos[] = new Producto($row);
                $row = $resultado->fetch();
            }
        }

        return $productos;
    }

    protected static function ejecutaConsulta ($sql)
    {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=tarea5";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;

        if (isset($dwes)) $resultado = $dwes->query($sql);
        return $resultado;
    }

    public static function obtieneProducto ($codigo)
    {
        $sql = "SELECT * FROM producto";
        $sql .= " WHERE cod='" . $codigo . "'";
        $resultado = self::ejecutaConsulta($sql);
        $producto = null;

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $producto = new Producto($row);
        }

        return $producto;
    }


    public static function obtieneOrdenador ($codigo)
    {
        $sql = "SELECT * FROM ordenador INNER JOIN producto ON ordenador.cod = producto.cod";
        $sql .= " WHERE producto.cod='" . $codigo . "'";
        $resultado = self::ejecutaConsulta($sql);
        $ordenador = null;

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $ordenador = new Ordenador($row);
        }

        return $ordenador;
    }

    public static function verificaCliente ($nombre, $contrasena)
    {
        $sql = "SELECT usuario FROM usuarios ";
        $sql .= "WHERE usuario='$nombre' ";
        $sql .= "AND contrasena='" . md5($contrasena) . "';";
        $resultado = self::ejecutaConsulta($sql);
        $verificado = false;

        if (isset($resultado)) {
            $fila = $resultado->fetch();
            if ($fila !== false) $verificado = true;
        }
        return $verificado;
    }

}

?>
