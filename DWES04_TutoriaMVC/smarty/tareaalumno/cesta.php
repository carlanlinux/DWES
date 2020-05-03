<?php
require_once('include/CestaCompra.php');
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

// Recuperamos la cesta de la compra
$cesta = CestaCompra::carga_cesta();

// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('productoscesta', $cesta->get_productos());
$smarty->assign('coste', $cesta->get_coste());

// Mostramos la plantilla
$smarty->display('cesta.tpl');
?>
