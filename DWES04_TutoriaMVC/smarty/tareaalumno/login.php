<?php

require_once('include/DB.php');

// Cargamos la librería de Smarty
require_once('smarty/libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'configs/';
$smarty->cache_dir = 'cache/';

// Comprobamos si ya se ha enviado el formulario
$smarty->assign('error', '');

if (isset($_POST['enviar'])) {

    if (empty($_POST['usuario']) || empty($_POST['password']))
        $smarty->assign('error', 'Debes introducir un nombre de usuario y una contraseña');
    else {
        // Comprobamos las credenciales con la base de datos
        if (DB::verificaCliente($_POST['usuario'], $_POST['password'])) {
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            header("Location: productos.php");
        } else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $smarty->assign('error', 'Usuario o contraseña no válidos!');
        }
    }
}

// Mostramos la plantilla
$smarty->display('login.tpl');
?>
