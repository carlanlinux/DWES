<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplicación Agenda - Tarea DEWS02</title>
</head>
<body>
<h1>Datos de la agenda</h1>


<?php
    //Crear el array de la agenda
    $agenda = array();

    //Si tiene datos el array pintamos los datos
    if(count($agenda) > 0) {
        foreach ($agenda as $nombre => $telefono) {
            echo "Nombre: " . $nombre . " | Teléfono: " . $telefono;
        }
    }
?>
<hr>

<form action="DWES02_process.php" method="post">
    Nombre: <input type="text" name="nombre"  value="" required><br>
    Teléfono: <input type="number" name="telefono" value=""><br>


    <?php
    $agenda = ["Pepe" => "91882882"];
    $agenda["Juanjo"] = "9kjkjkjk";


    foreach ($agenda as $nombre => $telefono) {
        echo "<input type=\"hidden\" name=\"nombre\"  value=\"{$nombre}\" required><br>";
        echo "<input type=\"hidden\" name=\"telefono\"  value=\"{$telefono}\" required><br>";
    } ?>

    <input type="submit"><br>

</form>

</body>
</html>