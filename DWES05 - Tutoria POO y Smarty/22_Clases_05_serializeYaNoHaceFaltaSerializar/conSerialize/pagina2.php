<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/* si lo guardas serializado, debes recuperarlo con unserialize()*/
include "Menu.php";
if (session_status() == PHP_SESSION_NONE)
    session_start();
echo "<h2>Desde otra página creamos un objeto de tipo Menu<br/>"
    . " y guardamos en él el contenido de la variable de sesión.<br/>"
    . " Tengo que usar unserialize, si no da error.</h2>";

$obj2 = new Menu();
$obj2 = unserialize($_SESSION['objeto']);
//            $obj2=$_SESSION['objeto'];
$obj2->mostrar();
echo "<h2>Si lo intento guardar sin crear el objeto desde otra"
    . " página da error.</h2>";

if (isset($_SESSION['objeto'])) {
    echo "existe la sesión del objeto<br/>";
    echo "<p>En este caso da error porque el objeto se guardó"
        . " serializado, hay que recuperarlo con unserialize</p>";
    $var = $_SESSION['objeto'];
    $var->mostrar();
} else {
    echo " No existe la sesión del objeto<br/>";
}
/* destruye las variables de sesión y la sesión */
session_unset();
session_destroy();
?>
</body>
</html>
