<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Procesado de datos del formulario</title>
</head>
<body>

<?php
    $agenda = array();
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    $agenda = [$nombre => $telefono];
    echo print_r($agenda);

?>
<?php ?> <br>
</body>
</html>



