<?php
//Conexón a la base de datos
$connection = new mysqli("localhost", "root", "root", "dwes");
$error = $connection->connect_errno;
if ($error != null) echo "Error $error de conexión a la base de datos: $connection->connect_error";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
    <h1>Ejercicio: </h1>
    <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
       <!-- Hacemos la query para que recojamos todos los nombres de producto -->
        <?php
            $productos = $connection->query('select nombre_corto from producto');
            $producto = $productos->fetch_object();

       ?>
        <!-- Pintamos el cuadro con el desplegable con todos los productos -->
        <select name = "productoEscogido" size="auto">
            <?php while($producto != null ) {
                echo "<option name='seleccion' >$producto->nombre_corto</option>";
                $producto = $productos->fetch_object();
            }
            ?>
        </select>
        <input type="submit">
    </form>
</div>

<div id="contenido">
    <h2>Contenido</h2>
    <!-- Recogemos los datos de la varable post con el nombre del producto y hacemos la query
     que nos devolverá el stock-->
    <?php
        $seleccion = $_POST[productoEscogido];

        if(!empty($seleccion)) {
            print "Consulta de stock de: " . $seleccion . ".<br><br>";
            //Poner la query, ojo con las comillas ismples a la hora de poner las cadenas en la query! Si no peta!!
            $query = $connection->query("select tienda, unidades from stock where producto = (select cod from producto where nombre_corto = '$seleccion')");
            //pintar una tabla
            echo "<table border='2' cellspacing='0'>";
            echo "<th>Tienda</th><th>Unidades</th>";

            //Pasamos los datos de la query a la variable
            $stock = $query->fetch_object();

            //Mientras stock tenga información y no esté null, pintas los datos y recoges la siguiente info de la query
            while ($stock != null) {
                echo "<tr align='center'><td>$stock->tienda</td><td>$stock->unidades</td></tr>";
                $stock = $query->fetch_object();
            }



        }




        $productos->close();
        $query->close();
        ?>

        </table>
</div>

<div id="pie">
</div>
</body>
</html>
