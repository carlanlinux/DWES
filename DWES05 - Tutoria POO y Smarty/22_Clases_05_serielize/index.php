<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include "Menu.php";
$menu1 = new Menu();
$menu1->cargarOpcion('http://www.google.com', 'Google');
$menu1->cargarOpcion('http://www.yahoo.com', 'Yhahoo');
$menu1->cargarOpcion('http://www.msn.com', 'MSN');
echo "<h2>Llamamos al método mostrar de la clase</h2>";
$menu1->mostrar();
echo "<hr>";
if (session_status() == PHP_SESSION_NONE)
    session_start();
$_SESSION['objeto'] = serialize($menu1);
echo "<h2>Hemos guardado el objeto en una variable de sesión"
    . "utilizando la función serialize(). <br/>Ahora una cadena de "
    . "caracteres con información que no entendemos</h2>";
echo $_SESSION['objeto'];
echo "<hr>";
$obj = unserialize($_SESSION['objeto']);
echo "<h2>Recuperamos con unserialize el contenido de la variable de "
    . "sesión.<br/> La recuperamos en una variable que no es un objeto.<br/>"
    . "Invocamos al método mostrar() y no da error, muestra"
    . " el contenido recuperado</h2>";
$obj->mostrar();
echo "<h2>Desde esa misma variable llamamos al método cargarOpcion()"
    . " para que añada el enlace de Firefox,<br/> y lo hace sin problemas.</h2>";
$obj->cargarOpcion('http://www.firefox.com', 'Firefox');
$obj->mostrar();
echo "<h2>Invocamos al método mostrar usando el objeto \$menu1 que"
    . " creamos al principio.<br/>"
    . " Observa que no está incluido el enlace de Firefox, son variables"
    . " distintas</h2>";
$menu1->mostrar();
echo "<br/><a href='pagina2.php'>Ir a otra página</a>";
?>
</body>
</html>
