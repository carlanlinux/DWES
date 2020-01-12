

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
      <?php
      //Comprobamos que si se da al botón cancelar redigirimos a la página listado.php 
      if(isset($_POST['btn_cancelar'])) {
          //Utilizamos la meta refresh que redirige en 0 segundos a la URL
          echo "<meta http-equiv='refresh' content='0; url=listado.php'>";
      //Si no se ha dado al botón cancelar es que se ha dado a actualizar y habría que
      //Actualizar los datos en la BD y mostrar mensaje de confirmación con botón de
      //Continuar que redirgiría a la página listado nuevamente.     
      } else {
                //Volvemos a escribir la meta correspondiente en la cabecera
                echo" <meta http-equiv='content-type' content='text/html; charset=UTF-8'>";

                //Creamos un array con los campos que necesitamos de nuestra variable post para la actualización y le
                // aplicamos los filtros default
                 $args = array(
                     'cod' => FILTER_DEFAULT,
                     'nombre' => FILTER_DEFAULT,
                     'nombre_Corto'=> FILTER_DEFAULT,
                     'descripcion' => FILTER_DEFAULT,
                     'pvp'  => FILTER_DEFAULT
                 );

                //Creamos una variable donde vamos a guardar los datos que recojamos de POST una vez filtrados
                //Le asignamos el valor de filtrar el array de post dentro del array que hemos creado anteriormente
                $datosPost = filter_input_array(INPUT_POST, $args);

                //Asignamos valores a las variables que vamos a necesitar para actualizar nuestra base de datos
                //Para ello entramos al array que hemos creado donde hemos guardado los valores recibidos por post
                $cod = $datosPost['cod'];
                $nombre_corto = $datosPost['nombre_Corto'];
                $nombre = $datosPost['nombre'];
                $descripcion = $datosPost['descripcion'];
                $pvp = $datosPost['pvp'];


          //Conectamos a la base de datos y controlamos excepciones
                try {
                   $dwes = new PDO("mysql:host=localhost; dbname=dwes", "dwes", "abc123.");
                    //Cambiamos la forma de gestionar erroes a excepciones para que
                     //podamos manejarlas
                   $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $ex) {
                    $error = $ex->getCode();
                    $mensaje = $ex->getMessage();
                }
                try {
                    $query = ("UPDATE producto SET nombre = '$nombre', nombre_corto ='$nombre_corto', descripcion='$descripcion', pvp='$pvp' WHERE cod like '$cod'");
                    $registros = $dwes->exec($query);
                } catch (PDOException $ex) {
                    echo "Error número: $error - $mensaje";
                }

                if ($registros == 1) {
                    echo "Se han actualizado los datos<br>";
                    echo "<form name='continuar' action='listado.php' method='post'>";
                    echo "<input type='submit' name='continuar' value='Continuar'> </form>";
                }
      }
    ?>
  
</head>

<body>

    
</body>
</html>
