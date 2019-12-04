<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplicación Agenda - Tarea DEWS02</title>
</head>
<body>
<h1>Datos de la agenda</h1>
<?php
    //1. Creamos el array donde tiene que ir toda la información
    //$agenda = array();

      $agenda = $_POST;
      foreach ($agenda as $id => $tel) {
          //echo $id;
          //echo $tel;
          //Estas dos sentencias me pinta: nombrePapatelefono989789
          //Luego intento asignar a nombre sólo la parte que tiene el valor(sin la clave) pero ya no me funciona
          $nombre = $id['nombre'];
          $telefono = $tel['telefono'];
          echo $nombre . " | " . $telefono; //Me pinta n | Pt | 9

          $agenda[$nombre] = $telefono;
}


    // FUNCIONA PARA UNO!! Si estamos recibiendo algún dato, incluyelo al array asociativo
    /*
    if(!empty($_POST)) {
        for ($i = 0; $i < count($_POST); $i++){
            $nombre = $_POST[$i]['nombre'];
            $telefono = $_POST[$i]['telefono'];
            $agenda[$nombre] = [$telefono];
        } */


        //$nombre = $_POST['nombre'];
        //$telefono = $_POST['telefono'];


        //$agenda[$nombre] = $telefono;


    //Si la agenda no está vacía píntame los datos en una tabla
    if(!empty($agenda)){
        echo "<table border='2' cellpadding='2' cellspacing=0> <th align='center'>Nombre</th> 
            <th align='center'>Teléfono</th>";
        foreach ($agenda as $nombre => $telefono) {
            echo "<tr align='center'><td>{$nombre}</td><td>{$telefono}</td></tr>";
        }
        echo "</table>";
    }

?>
<hr>

<form action="" method="post">
    Nombre: <input type="text" name="nombre"  value="" required><br>
    Teléfono: <input type="number" name="telefono" value=""><br>

    <input type="submit"><br>

    <?php
    foreach ($agenda as $nombre => $telefono) {
        echo "<input type=\"hidden\" name=\"{$nombre}\" value=\"{$telefono}\"><br>";
    }
    ?>

</form>

</body>
</html>