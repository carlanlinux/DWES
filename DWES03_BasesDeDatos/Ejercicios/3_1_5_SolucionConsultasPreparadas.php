<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
if (isset($_POST['producto'])) $producto = $_POST['producto'];
@ $connection = new mysqli("localhost", "root", "root", "dwes");
$error = $connection->connect_errno;

if ($error == null) {
    //Comrobamos si tenemos que actualizar los valores
    if (isset($_POST['actualiz'])) {
        //Preparamos la consulta
        $tienda = $_POST['tienda'];
        $unidades = $_POST['unidades'];
        $consulta = $connection->stmt_init();
        $sql = "UPDATE stock SET unidades = ? where tienda = ? and producto='$producto'";
        $consulta->prepare($sql);

        //Ejecutamos la consulta dentro de un bucle
        for ($i = 0; i < count($tienda); $i++) {
            $consulta->bind_param('ii',$unidades[$i], $tienda[$i]);
            $consulta->execute();
        }
        $mensaje = "Se han actualizado los datos.";
        $consulta->close();
    }
    //Si no se ha podido estblecer la conexión generamos un mensaje de error
    else $mensaje = $dwes->connect_error;
}
?>
<header>
    <h1>Ejercicio consultas preparadas con MySQLi</h1>
    <form id="form_seleccion" action="" method="post">
        <span>Producto: </span>
        <select name="producto">
            <?php
            //Rellenamos el desplegable con los datos de todos los productos
            if ($error == null){
                $sql = "SELECT cod, nombre_corto from producto";
                $resultado = $connection->query($sql);
                if ($resultado) {
                    $row = $resultado->fetch_assoc();
                    while ($row !=null) {
                        echo "<option value='${row['cod']}'";
                        //si se recibe un código de producto lo seleccionamos
                        //En el desplegable usando selected = true
                        if (isset($producto) && $producto == $row['cod']) {
                            echo " selected = 'true'";
                        }
                        echo ">${row['nombre_corto']}</option>";
                        $row = $resultado->fetch_assoc();
                    }
                    $resultado->close();
                }
            }
            ?>
        </select>
            <input type="submit" value="Mostrar Stock" name="enviar">
    </form>
</header>
<div id="contenido">
    <h2>Stock del producto en las tiendas</h2>
    <?php
    //Si se recibió un código de produto y no se produjo ningún error
    //Mostraremos el stock de ese producto en las diferentes tiendas
    if ($error == null && isset($producto)){
        //Ahora necesitamos también el codigo de tienda
        $sql = <<<SQL
select tienda.cod, tienda.nombre, stock.unidades
from tienda inner join stock on tienda.cod = stock.tienda
where stock.producto='$producto';
SQL;
    $resultado = $dwes->query($sql);
    if ($resultado){
        //Creamos un formulario con los valores obtenidos
        echo '<form id="form_actualiz" action="" method="post"> ';
        $row = $resultado->fetch_assoc();
        while ($row != null) {
            //Metemos ocultos el códido de producto y los de las tiendas
            echo "<input type='hidden' name='producto' value='{$producto}'>";
            echo "<input type='hidden' name='tienda[]' value='".$row['cod']."'>";
            echo "<p>tienda ${row['nombre']}: ";
            //El número de unidades ahora va en un cuadro de texto
            echo "<input type='text' name='unidades[]' size='4' ";
            echo "value = '".$row['unidades']."' /> unidades. </p>";
            $row = $resultado->fetch_assoc();
        }
        $resultado->close();
        echo "<input type='submit' value='Actualizar' name='actualiz'>";
        echo "</form>";
    }


    }
    ?>
</div>
<footer>
    <?php
        //si se produjo algún error se muestra en el pie
        if ($error != null) {
            echo "<p>Se ha producido un error $mensaje</p>";
        } else {
            echo $mensaje;
            $connection->close();
            unset($connection);
        }
    ?>
</footer>
</body>
</html>
