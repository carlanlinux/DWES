<!--Escribe un programa PHP que permita al usuario introducir una fecha y la valide como fecha correcta.
El formato de la fecha será “dd-mm-yyyy”.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Página de cálculo</title>
</head>
<?php
$validar = false;
if (isset($_POST['fecha'])){
    $fecha = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);
    $validar = preg_match("/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/", $fecha);
}
?>
<body>
<form name="fecha" action="" method="post">
    <label for="fecha">Introducir fecha</label>
    <input id="fecha" name="fecha" type="text" <?php if ($validar) echo "value={$fecha}"?> required >
    <input type="submit"  value="Enviar Fecha"><br>
    <span><?php if ($validar) echo "Fecha correcta"?></span>
</form>
</body>
</html>