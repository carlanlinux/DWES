<?php
/*
 * Borra la cookie poniendo una fecha anterior a la actual.
 * Muestra un mensaje inidando qe se ha borrado y un enlace a la página
 * principal.
 */
setcookie("usuario", "", time() - 1000);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
Se ha borrado la cookie
<br>
<a href="index.php">Ir a la página principal</a>
</body>
</html>
