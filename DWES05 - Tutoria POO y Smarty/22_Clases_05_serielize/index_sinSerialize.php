<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include "Menu.php";
echo "<h3>Creo un objeto menú y lo guardo en una variable de sesión</h3>";
$menu1 = new Menu();
$menu1->cargarOpcion('http://www.google.com', 'Google');
$menu1->cargarOpcion('http://www.yahoo.com', 'Yhahoo');
$menu1->cargarOpcion('http://www.msn.com', 'MSN');
$menu1->mostrar();
echo "<hr>";
echo "<p>Muestro el contenido de la sesión</p>";
if (session_status() == PHP_SESSION_NONE)
    session_start();
$_SESSION['objeto'] = $menu1;
var_dump($_SESSION['objeto']);
echo "<hr>";
echo "<h3>Soy capaz de recuperar el el contenido sin recuperarlo sin crear un objeto</h3>";
echo "<p>Uso el método mostrar en el segundo objeto</p>";
$menu2 = $_SESSION['objeto'];
$menu2->mostrar();
echo "<hr>";
echo "<br/><a href='pag2_sinSerialize_1.php'>Ir a otra página</a>";
?>
</body>
</html>
