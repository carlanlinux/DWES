<?php
/*
 * Inicia / crea la sesión si no es ha iniciado /creado antes.
 *
 * comprueba si el valor de la variable de sesión login vale true, y de ser así si existe el usuario lo pone en una
 * variable y lo muestra en pantalla.
 * Además, borra la variable de sesión login
 *
 * Si no muestra mensaje indicando que no se ha registrado y va a login
 *
 *
 */

if (session_status() == PHP_SESSION_NONE)
    session_start();
/*
 * Si existe la variable en la que hemos guardado el estado del login y esta vale
 * true, ha habido identificación, comprueba el valor del usuario y muestra los 
 * datos. Finalmente destruye la variable de sesión del login.
 * Si no existe la variable de login o es false muestra un mensaje indicando
 * que ha habido un error.
 */
if (isset($_SESSION['login']) && $_SESSION['login'] == "true") {
    if (isset($_SESSION['usuario'])) {
        $nombre = $_SESSION['usuario'];
        echo "<br/>Página2.php - USUARIO logeado<br/>";
        echo "<br/>Página2.php - usuario = " . $_SESSION['usuario'] . "<br/>";
        echo "<br> pagina2.php - ID sesión= " . session_id() . "<br/>";
        /* por si acaso la borra. Si tuviera que ir a otra página y el usuario es 
         * necesario, volveríamos a crearla
         */
        unset($_SESSION['login']);
    }
} else {
    echo "<br> pagina2.php - No SE HA REGISTRADO O NO HAY SESIÓN, debería redirigir a la a la página de login </br>";
    include('login.php');
    die;
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
    <p><?php if (isset($nombre)) echo "Hola " . $nombre ?></p>
    <label>Si pulsas el botón va a la página 3 donde se borran la sesion</label>
    <input type="submit" name="borrar" value="Borrar sesión">
</form>
</body>
</html>
