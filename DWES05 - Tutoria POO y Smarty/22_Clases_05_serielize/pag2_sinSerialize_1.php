<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include "Menu.php";
echo "<h3>Comprueba si existe la variable de sesión y la recupero</h3>";
echo "<p>Muestro el contenido de la sesión</p>";
if (session_status() == PHP_SESSION_NONE)
    session_start();
if (isset($_SESSION['objeto'])) {
    echo "existe la sesión del objeto<br/>";
    $datos = $_SESSION['objeto'];
    print_r($datos);
    echo "<br/>";
    $datos->mostrar();
} else {
    echo " No existe la sesión del objeto<br/>";
}
?>
</body>
</html>
