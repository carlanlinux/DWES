<?php
/*
 * Inicia / crea la sesión si no es ha iniciado /creado antes.
 * si existe la variable de sesión login,  guarda el usuario, borra
     * todas las variables de sesión, y destrue la sesión.
 *
 * si no, muestra un mensaje indicando que debería registraese
 *
 */

if (session_status() == PHP_SESSION_NONE)
    session_start();
/*
 * Comprueba si existe la variable de sesión login. si es así mira si hat usuario 
 * y se lo asigna a una variable. Después borra el contenido de las variables de
 * sesión y la propia sesión.
 */
if (isset($_SESSION['login'])) {
    if (isset($_SESSION['usuario']))
        $nombre = $_SESSION['usuario'];
    session_unset();
    session_destroy();
} else {
    /*
     * Si no existe la variable de sesión de login ha llegado a esta página
     * sin identificarse primero.
     */
    echo "<br> pagina3.php - No SE HA REGISTRADO O NO HAY SESIÓN, debería redirigir a la a la página de login </br>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="index.php" method="post">
    <p> <?php if (isset($nombre)) echo "Hola " . $nombre ?></p>
    <label>Si pulsas el botón va a la página login</label>
    <input type="submit" name="loguear" value="volver">
</form>
</body>
</html>
