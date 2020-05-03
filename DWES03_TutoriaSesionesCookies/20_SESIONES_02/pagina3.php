<?php
/*
 * Comprueba si la sesión no existe o está iniciada,  la crea/inicia
 * comprueba si existe el usuario, si es así lo guarda en una variable y
 * borra las variables de sesión con session_unset y destruye la sesión.
 * Si no existe muestra un mensaje y debería redirigir a la página de login.
 *
 * Hay un formulario en el que muestra el nombre del usuario que se ha
     * logueado y un botón para volver a la página de login.
     *
     *
 */
if (session_status() == PHP_SESSION_NONE)
    session_start();
if (isset($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario'];
    session_unset();
    session_destroy();

} else {
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
