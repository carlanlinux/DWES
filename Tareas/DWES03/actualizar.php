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
            //Si recibimos un código, lo guardamos en la variable 
            if(isset($_POST[cod])) $codigo = $_POST[cod];
            
            //Nos conectamos a la base de datos capturando los posubles erroes
           try {
               $dwes = new PDO("mysql:host=localhost; dbname=dwes", "root", "");
               $error = $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
           } catch (PDOException $ex) {
               $error = $ex->getCode();
               $mensaje = $ex->getMessage();
           }
            
        ?>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	</form>
</div>

<div id="contenido">
	<h2>Contenido</h2>
</div>

<div id="pie">
</div>
</body>
</html>
