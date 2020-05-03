<?php
/*
 * comprueba si no hay sesión, la comienza / crea. esta es una forma de evitar que salga el warning de que se
 * ha intentado iniciar una sesión y ya está iniciada (suele ocurrir cuando se incluyen ficheros con include o requie.
 * Si no se ha iniciado o creado se inicia o crea.
 * se comprueba si existe el usuario, es decir que se ha guardado el nombre que se escribió en el formulario en la sesión.
 * si existe, se guarda en una variablwe y se muestra en pantalla, junto con el id de la sesión.
 * Si no existe, indica en un mensaje que no se ha logueado e incluye el script login.php finalizando la ejecución de este script.
 */
if (session_status() == PHP_SESSION_NONE)
    session_start();
if (isset($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario'];
    echo "<br/>Página2.php - USUARIO logeado<br/>";
    echo "<br/>Página2.php - usuario = " . $_SESSION['usuario'] . "<br/>";
    echo "<br> pagina2.php - ID sesión= " . session_id() . "<br/>";
    //por si acaso la borra. Si tuviera que ir a otra página y el usuario es necesario volveríamos a crearla
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
