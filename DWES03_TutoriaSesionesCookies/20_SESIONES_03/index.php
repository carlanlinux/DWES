<?php
/*
     * Ejemplo muy parecido al anterior, pero solucionando el problema que
     * tenía.
     *
 * Inicia / crea la sesión.
 * comprueba si ha pulsado el botón del formulario (existir ha de existir  porque si no no habría redirigido a esta página)
 * Si lo ha pulsado, guarda en una variable de sesión el nombre del usuario, y en otra un valor true, cpara indicar que hay alguien logueado.
 *
 * comprueba si se ha pulsado el botón para borrar la sesión, y el nombre del usuario no está vacío, pone el valor de login a true y
 * va a la página3.
 *
 * si existe el botón borrar, pero no hay nada en $_REQUEST (GET o POST) va a loguin.php
     *
 */
session_start();
if (!empty($_REQUEST['identificar'])) {
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $_SESSION['usuario'] = $_POST['nombre'];
        /* creamos una variable se sesión en el caso de que 
         * haya habido una identificación positiva. Esa variable va a tener valor 
         * true.
         */
        $_SESSION['login'] = "true";
        include_once('pagina2.php');
        die;
    }
}
if (isset($_POST['borrar']) && isset($_SESSION['usuario'])) {
    // si existe usuario y se va a otra página e indica que hay login
    // el botón borrar está en la página 2, y debería haber usuario logueado.
    $_SESSION['login'] = "true";
    include_once('pagina3.php');
    die;
} //else if(isset($_POST['borrar']) || empty($_REQUEST))
else {
    //en cualquier otro caso redirige a login
    include_once('login.php');
    die;
}
?>
