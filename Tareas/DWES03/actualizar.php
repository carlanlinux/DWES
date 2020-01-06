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
                //Asignamos valores a las variables que vamos a necesitar para actualizar
                //nuestra base de datos
                $cod = $_POST['cod'];
                $nombre_corto = $_POST['nombre_Corto'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $pvp = $_POST['pvp'];

                //Conectamos a la base de datos y controlamos excepciones
                try {
                   $dwes = new PDO("mysql:host=localhost; dbname=dwes", "root", "");
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
