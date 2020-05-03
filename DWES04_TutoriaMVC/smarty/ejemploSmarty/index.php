<?php
require_once('Smarty.class.php');

//creamos una instancia de smarty
$smarty = new Smarty();

//añadimos las rutas de las carpetas a la plantilla
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->config_dir = 'configs';
$smarty->cache_dir = 'cache';

/* con rutas absolutas sería:
$smarty->compile_dir = 'c:\xampp\htdocs\smarty\tareaU4\templates';
$smarty->compile_dir = 'c:\xampp\htdocs\smarty\tareaU4\templates_c';
$smarty->config_dir = 'c:\xampp\htdocs\smarty\tareaU4\configs';
$smarty->cache_dir = 'c:\xampp\htdocs\smarty\tareaU4\cache';
*/

$smarty->assign('titulo', 'Prueba de smarty');
$smarty->assign('nombre', 'Ana');

//mostramos el archivo index.tpl
$smarty->display('index.html');
?>
