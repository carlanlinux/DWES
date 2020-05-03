<?php
require_once('include/DB.php');
require_once('Smarty.class.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario']))
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'configs/';
$smarty->cache_dir = 'cache/';

// Comprobamos si se ha enviado el código del producto a mostrar
if (!isset($_GET['cod'])) {
    // Mostrar error

}


// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('ordenador', DB::obtieneOrdenador($_GET['cod']));

// Mostramos la plantilla
$smarty->display('muestraordenador.tpl');
?>