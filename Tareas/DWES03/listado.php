<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
	<h1>Tarea: Listado de productos de una familia </h1>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
           
            <label>Familia: </label>
            <select name="codProducto">
            <?php
           
            //Si recibimos un código, lo guardamos en la variable 
            if (isset($_POST['codProducto'])) $codigo = $_POST['codProducto'];
            
            //Conectamos a la base de datos y contorlamos excepciones
            try {
                 $dwes = new PDO("mysql:host=localhost;dbname=dwes", "root", "");
                 $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            } catch (PDOException $ex) {
                $error = $ex->getCode();
                $mensaje = $ex->getMessage();

            }
           
            //Si no hay ningún error comenzamos a pintar los option de los select 
            if (!isset($error)) {
                //Ponemos la query que necesitamos para que nos devuelv
                $query = "SELECT cod, nombre FROM familia"; 
                //Ejecutamos la query
                $resultado = $dwes->query($query);
                //Comprobamos que nos haya devuelto datos
                if ($resultado) {
                    //Leemos el primer registro devuelto
                    $fila = $resultado->fetchObject();
                    //Mientras haya registros, es decir, que fila sea diferente a null que 
                    //nos pinte los option
                    while ($fila != null){
                        //Se da al atributo value del cada option el valor con el nombre de la familia
                        echo "<option value=$fila->cod";
                        //Si se recibe un código de producto lo seleccionamos
                        //en el option usando el atributo selected='true'
                            if(isset($codigo) && $codigo == $fila->cod){
                                echo " selected ='true'";
                            }
                        //Cerramos el Option y mostramos el nombre de la familia
                        echo ">$fila->nombre </option>";
                        //Seguimos leyendo resgistros hasta completar todo, si no
                        //encuentra más devolverá null y saldremos del bucle.
                        $fila = $resultado->fetchObject();
                    }
                }
                
                
            }
        ?>    
        </select>
       <!-- Ponemos le botón para enviar a la misma página la información y que la 
        podamos recoger. -->
        <input type="submit" value="Mostrar Productos" name="enviar" />
	</form>
</div>

<div id="contenido">
	<h2>Productos de la familia</h2>
        <?php
            //Si no hay errores y se recibieron correctamente los productos
            //mostramos los datos. 
            if (!isset($error) && isset($codigo)) {
                $sql = "SELECT cod, nombre_corto, pvp FROM producto WHERE familia like '$codigo'";
                //Ejecutamos la query;
                $resultado = $dwes->query($sql);
                //Si resultado tiene datos
                if($resultado) {
                    //Leemos el primer registro
                     $fila = $resultado->fetchObject();
                //Mientras haya registros, es decir, que fila sea diferente a null
                //que nos pinte el resultado con los datos solicitados
                while ($fila != null) {
                    
                    //Pintamos un formulario para cada producto con su respectivo botón
                    echo "<form id='formProducto' action='editar.php' method='post'>";
                    //Pintamos el texto con los datos del producto
                    echo "Producto: <b>" . $fila->nombre_corto . " - " . $fila->pvp . " euros</b>."; 
                    //Creamos un campo hidden donde guardar la información
                    echo "<input type='hidden' name='cod' value='$fila->cod'/>";
               
                    //Pintamos el botón y cerramos formulario
                    echo "<input type='submit' value='Editar' name='editar'/></form>";
                    //Seguimos leyendo los registros hasta completar todo, si no encuentr
                    //más devolverá null y saldrá del bucle. 
                    $fila = $resultado->fetchObject();
                }
                
               
                }
                
            }
        ?>
</div>

<div id="pie">
</div>
</body>
</html>
