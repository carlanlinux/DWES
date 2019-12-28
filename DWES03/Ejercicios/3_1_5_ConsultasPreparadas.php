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

<<<<<<< HEAD
<div id="contenido">
=======
<form id="contenido">
>>>>>>> origin/master
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
<<<<<<< HEAD
            echo "<form id='actualizarStock'>";
            echo "<table border='2' cellspacing='0'>";
            echo "<th>Tienda</th><th>Unidades</th><th>Actualizar stock</th>";
=======
            echo "<form id='ActStock' action='' method=\"post\">";
            echo "<table border='2' cellspacing='0'>";
            echo "<th>Tienda</th><th>Unidades</th><th>Actualizar Stock</th>";
>>>>>>> origin/master

            //Pasamos los datos de la query a la variable
            $stock = $query->fetch_object();

            //Mientras stock tenga información y no esté null, pintas los datos y recoges la siguiente info de la query
<<<<<<< HEAD
            //Y ponemos un cuadro de texto que actualizará el stock en cuanto se le de a sumbit.

            while ($stock != null) {
                echo "<tr align='center'><td>$stock->tienda</td><td>$stock->unidades</td><td>
                   <input name='actStock' type='text'></td></tr>";

                $stock = $query->fetch_object();
            }

        }



=======
            while ($stock != null) {
                echo "<tr align='center'><td>$stock->tienda</td><td>$stock->unidades</td><<td><input type='text' name=\"actStock{$stock->tienda}\"> </td></tr>";
                $stock = $query->fetch_object();
            }



        }
>>>>>>> origin/master

        $productos->close();
        $query->close();
        ?>

        </table>
<<<<<<< HEAD
    <input type="submit">
    </form>
</div>

=======
        <input type='submit'>
        </form>
</div>

        <?php
            //Consulta preparada
            //Indicamos que va a ser una consulta preparada
            $stockQuery = $connection->stmt_init();
            //Montamos la query update
            $stockQuery = $stockQuery->prepare('update stock set unidades=(?) 
                where producto = (select cod from producto where nombre_corto = \'$seleccion\') 
                and tienda = (?)');

            //ligamos las variables a los parámetros


            if(!empty($_POST))
                while ($_POST != null)
            echo "$_POST";
            echo "$_POST{actStock}"
            // ejecutar query $stockQuery->bind_param('ii', $cod_tienda, $nuevoStock);


        ?>

>>>>>>> origin/master
<div id="pie">
</div>
</body>
</html>
