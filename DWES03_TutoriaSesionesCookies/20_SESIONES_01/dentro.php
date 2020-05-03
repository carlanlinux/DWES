<?php
// Array con los usuarios y claves posibles
$usuariosValidos = array('alfa' => 'beta', 'gamma' => 'delta', 'epsilon' => 'dseta');
//iniciamos sesión
session_start();

/*
 * Comprueba si ha llegado algo en usuario y clave y mira en el array si
 * existe ese usuario y esa clave. De ser así lo guarda en dos varaibles de
 * sesión.
 * Comprueba si el checkbox se ha seleccionado, de ser así guarda en una
 * variable de sesión el valor que contiene (1) y asigna un valor al mensaje
 */
if (isset($_REQUEST['usuario'])) {
    $usuario = $_REQUEST['usuario'];
}

if (isset($_REQUEST['clave'])) {
    $clave = $_REQUEST['clave'];
}

$mantener = '';
if (isset($usuariosValidos[$usuario]) &&
    $clave == $usuariosValidos[$usuario]) {  // el usuario existe en el array y tiene la clave recibida
    $_SESSION['usuarioAutenticado'] = $usuario;
    $_SESSION['clave'] = $clave;
    /* si se marcó la casilla "recordar datos introducidos" la variable existe
     * y guarda su valor ("mantener") en una varialble de sesión
     */
    if (isset($_REQUEST['mantener'])) {
        $_SESSION['mantener'] = $_REQUEST['mantener'];
        $mantener = 'El ordenador recordará los datos introducidos al desconectar';
    } //si no se marcó la casilla, borra la variable de sesión si esta existiera
    else if (isset($_SESSION['mantener']))
        unset($_SESSION['mantener']);
} else {
    // las credenciales usuario/clave no son válidas y manda el mensaje por URL
    header("Location: login.php?mensaje=Usuario y/o clave incorrectos&usuario=$usuario");
}

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
Bienvenido <b><?php echo $usuario; ?></b> <br/>
<?php if (!empty($mantener)) {
    echo $mantener . '<br />' . PHP_EOL;
} ?>
<a href="login.php?mensaje=Hasta la próxima, <?php echo $usuario; ?>">Desconectar</a>
</body>
</html>
