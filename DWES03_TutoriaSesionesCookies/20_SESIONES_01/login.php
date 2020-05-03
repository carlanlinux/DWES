<?php
/*
 *  Este ejemplo consiste en una página de login en la que se introducirá un 
 *  nombre de usuario y una contraseña y se marcará un checkbox si se desea 
 *  que se recuerden los datos introducidos al volver a esta página
 *  usuario válido "alfa" ->"beta"
 *  si se marca la opción "recordar datos introducidos al desconectar" aparecerán
 *  en los campos input del formulario los datos que se introdujeron al 
 *  identificarse.
 */
// tratamiento de sesión
session_start();

//Estas variables hay que inicializarlas, porque en el formulario se hace un
//echo de cada una de ellas si no se han inicializado con algún valor dará
//error.
// asigna a una variable mensaje un texto por defecto, "no está conectado"
$mensaje = 'No está conectado';
$usuario = '';
$clave = '';

// recepción de parámetros
if (isset($_REQUEST['usuario'])) {
    $usuario = $_REQUEST['usuario'];
}
$mantener = '';
if (isset($_SESSION['usuarioAutenticado']) && isset($_SESSION['mantener'])) {
    $usuario = $_SESSION['usuarioAutenticado'];
    $clave = $_SESSION['clave'];
    $mantener = 'checked="checked"';
} /* Si nos ha llegado algún mensaje sobrescribimos lo que tuviera la variable
     * En este caso el mensaje es destruir la sesión, para que no recuerde los datos
     * que se introdujeron en el formulario, y estos se muestran vacíos.
     * Además, destruye las variables de sesión y la sesión
     */
else if (!isset($_SESSION['mantener'])) {
    session_unset();
    session_destroy();
}
if (isset($_REQUEST['mensaje'])) {
    $mensaje = $_REQUEST['mensaje'];
}
/*
 * Al pintar el formulario muestra el contenido de las variables.
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php echo $mensaje; ?><br/><br/>

<form name="f1" action="dentro.php" method="get">
    Usuario: <input type="text" name="usuario" value="<?php echo $usuario; ?>"><br/><br/>
    Contraseña: <input type="password" name="clave" value="<?php echo $clave; ?>"/> <br/><br/>
    Recordar Datos<input type="checkbox" name="mantener" value="mantener" <?php echo $mantener; ?> /> <br/><br/>
    <input type="submit" value="Enviar"/>
</form>
</body>
</html>
