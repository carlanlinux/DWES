<?php
require_once('DB.php');

class CestaCompra
{
    protected $productos = array();

    // Introduce un nuevo artículo en la cesta de la compra

    public static function carga_cesta ()
    {
        if (!isset($_SESSION['cesta'])) return new CestaCompra();
        else return ($_SESSION['cesta']);
    }

    // Obtiene los artículos en la cesta

    public function nuevo_articulo ($codigo)
    {
        $producto = DB::obtieneProducto($codigo);
        $this->productos[] = $producto;
    }

    // Obtiene el coste total de los artículos en la cesta

    public function get_productos ()
    {
        return $this->productos;
    }

    // Devuelve true si la cesta está vacía

    public function get_coste ()
    {
        $coste = 0;
        foreach ($this->productos as $p) $coste += $p->getPVP();
        return $coste;
    }

    // Guarda la cesta de la compra en la sesión del usuario

    public function vacia ()
    {
        if (count($this->productos) == 0) return true;
        return false;
    }

    // Recupera la cesta de la compra almacenada en la sesión del usuario

    public function guarda_cesta ()
    {
        $_SESSION['cesta'] = $this;
    }

    // Muestra el HTML de la cesta de la compra, con todos los productos

    public function muestra ()
    {
        // Si la cesta está vacía, mostramos un mensaje
        if (count($this->productos) == 0) print "<p>Cesta vacía</p>";
        //  y si no está vacía, mostramos su contenido
        else foreach ($this->productos as $producto) $producto->muestra();
    }
}

?>
