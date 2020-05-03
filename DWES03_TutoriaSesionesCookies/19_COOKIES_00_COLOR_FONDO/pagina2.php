<?php
/* se comprueba si nos ha llegado un color desde el formulario
 * se guarda en una cookie el color elegido o el color por defecto.
 */
$color = "#ffffff";
if (isset($_REQUEST['radio'])) {
    if ($_REQUEST['radio'] == "rojo")
        $color = "#ff0000";
    elseif ($_REQUEST['radio'] == "verde")
        $color = "#00ff00";
    elseif ($_REQUEST['radio'] == "azul")
        $color = "#0000ff";
}
//valor de caducidad de la cookie: 1 año.
setcookie("color", $color, time() + 60 * 60 * 24 * 365);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
Se ha creado la cookie.
<br>
<a href="index.php">Ir a la otra página</a>
</body>
</body>
</html>
