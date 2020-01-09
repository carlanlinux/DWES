<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
	<h1>Tarea: Edición de un producto </h1>
        <?php
            define('ACCESO_COD', 'cod');
            //Si recibimos un código, lo guardamos en la variable 
            if(isset($_POST[ACCESO_COD])) $codigo = $_POST[ACCESO_COD];
            
            //Nos conectamos a la base de datos capturando los posubles erroes
           try {
               $dwes = new PDO("mysql:host=localhost; dbname=dwes", "root", "root");
                //Cambiamos la forma de gestionar erroes a excepciones para que
                 //podamos manejarlas
               $error = $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
           } catch (PDOException $ex) {
               $error = $ex->getCode();
               $mensaje = $ex->getMessage();
           }
            
        ?>

</div>

<div id="contenido">
	<h2>Producto</h2>
        <form id="form_actualizar" action="actualizar.php" method="post">
        <?php
        
        try {
             //Hacemos una consulta a la base de datos para que nos devuelva la información. 
             $query = "select * from producto where cod like '$codigo'";
            //Ejecutamos la query
            $resultado = $dwes->query($query);
        } catch (PDOException $ex) {
            echo "Error número: $error - $mensaje";
        }
       
        //si nos devuele datos entonces...
        if($resultado !=null) {
            //Recogemos los datos del primer registro. 
            $producto = $resultado->fetchObject();
            //Pintamos los cuadros de texto con su label correspondiente
            echo "<label>Nombre corto: </label><input type='text' name='nombre_Corto' "
            . "value='$producto->nombre_corto' size='46'/><br>";
            echo "<label>Nombre: </label><br><textarea name='nombre' rows='5' "
            . "cols='55'>$producto->nombre</textarea><br>";
            echo "<label>Descripción: </label><br><textarea name='descripcion' "
            . "rows='10' cols='55'>$producto->descripcion</textarea><br>";
            //echo "<label>Nombre: </label><br><input type='text' name='nombre' value='$producto->nombre' size='auto'/><br>";
            //echo "<label>Descripción: </label><br><input type='text' name='descripcion' value='$producto->descripcion' size='auto'/><br>";
            echo "<label>PVP: </label><input type='text' name='pvp' name='pvp' value='$producto->pvp' size='4'/><br><br>";
            //Pintmos los botones
            echo "<input type='submit' name='btn_actualizar' value='Actualizar'/>";
            echo "<input type='submit' name='btn_cancelar' value='Cancelar'/>";
            //Pintamos un campo oculto para pasar el codigo del producto ya que no se pide
            //que se muestre pero si se necesita para la query de actualizar
            echo "<input type='hidden' name='cod' value='$producto->cod'/>";
        }
            
        ?>
            
        </form>
</div>

<div id="pie">
</div>
</body>
</html>
