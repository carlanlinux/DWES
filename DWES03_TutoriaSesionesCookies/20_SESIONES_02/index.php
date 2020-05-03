<?php
/*
 * se inicia o crea la sesión.
 * se comprueba si se ha pulsado el botón de envío del formulario  y si
 * existe y tiene valor el campo donde se debía introducir el nombre,
 * lo guarda en una variable de sesión.
 *
 * Se comprueba si se ha pulsado el botón borrar (que borrará las
 * sesiones) que está en el script pagina2.php. si es así y además
 * no existe el elemento usuario en la sesión, se incluye el código del
 * script pagina3.php y se finaliza el script actual
 * si no, si no se ha pulsado el botón borrar (no existe) o no ha llegado
 * nada del formulario se incluye el código del script login.php
 * y se finaliza el script actual.
 *
 * el problema de este ejercicio, es que una vez que me he logueado y
 * estoy en la página 2, si ejecuto directamente la pagina2 o la página3
 * me conserva los datos se acceso, y eso en algunas aplicaciones puede
 * ser un problema. Es decir necesitas asegurarte de que has pasado por
 * el proceso de login.
 *
 * En este ejemplo además todo el control del programa se hace desde el
 * archivo index (introdución a MVC)
 */
session_start();
if (!empty($_REQUEST['identificar'])) {
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $_SESSION['usuario'] = $_POST['nombre'];
        include_once('pagina2.php');
        die;
    }
}
if (isset($_POST['borrar']) && isset($_SESSION['usuario'])) {
    //si existe usuario y ha pulsado borrar se va a otra página
    include_once('pagina3.php');
    die;
} else {
    include_once('login.php');
    die;
}

?>
