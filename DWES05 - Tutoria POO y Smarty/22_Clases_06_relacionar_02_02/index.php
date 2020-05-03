<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/*
 * En este ejemplo se pasa como parámetro en el método insertar de la
 * clase Menu, un objeto de la clase Configuración.
 */
require 'Menu.php';
require 'Configuracion.php';
/*
 * Creamos un menu horizontal
 * Creamos una configuración para un enlace.
 * Invocamos al menú insertar del objeto menú (que guarda en un aaray de
 * opciones las propiedades del objeto) pasándole como parámetro
 * el objeto de la clase configuración.
 */
$menu1 = new Menu('horizontal');
$opcion1 = new Configuracion('Google', 'http://www.google.com', '#C3D9FF');
$menu1->insertar($opcion1);
$opcion2 = new Configuracion('Yahoo', 'http://www.yahoo.com', '#CDEB8B');
$menu1->insertar($opcion2);
$opcion3 = new Configuracion('MSN', 'http://www.msn.com', '#E9967A');
$menu1->insertar($opcion3);
$menu1->mostrar();
echo '<hr><br>';

$menu1 = new Menu('Vertical');
$opcion4 = new Configuracion('Google', 'http://www.google.com', 'aquamarine');
$menu1->insertar($opcion4);
$opcion5 = new Configuracion('Yahoo', 'http://www.yahoo.com', 'hotpink');
$menu1->insertar($opcion5);
$opcion6 = new Configuracion('MSN', 'http://www.msn.com', 'yellow');
$menu1->insertar($opcion6);
$menu1->mostrar();

?>
</body>
</html>
