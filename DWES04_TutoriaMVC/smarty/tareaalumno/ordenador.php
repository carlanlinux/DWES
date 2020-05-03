<?php
require_once('include/DB.php');
require_once('smarty/libs/Smarty.class.php');

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

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $smarty->assign('producto', DB::obtieneProducto($codigo));
    $smarty->assign('ordenador', DB::informacionOrdenador($codigo));

}

$smarty->display('ordenador.tpl');

?>