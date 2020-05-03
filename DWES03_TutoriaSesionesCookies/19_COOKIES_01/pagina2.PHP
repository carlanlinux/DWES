<?php
/*
 * Guarda la cookie usuario con el valor que le ha llegado del formulario
 * con una duración de un año.
 *
 * En el código HTML, se muestra un mensaje inidcando que se ha creado la
 * cookie y un enlace para ir a la página principal.
 */
setcookie("usuario", $_REQUEST['nombre'], time() + 60 * 60 * 24 * 365);
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
<a href="index.php">Ir a la página principal</a>
</body>
</html>
