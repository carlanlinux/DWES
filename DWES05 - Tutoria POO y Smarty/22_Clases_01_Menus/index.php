<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include "Menu.php";
/*
 * crea un objeto de la clase menu.
 * invoca al método cargarOpcion tantas veces como enlaces quiera para
 * guardar en la clase el contenido de los enlaces.
 * invoca al método mostar
 *
 * Observa que no se puede acceder directamente a las propiedades ya que
 * su visibilidad es de tipo private. Por tanto, la forma de asignar o
 * recuperar los valores de los atributos es utilizando métodos.
 */

$menu1 = new Menu();
$menu1->cargarOpcion('http://www.google.com', 'Google');
$menu1->cargarOpcion('http://www.yahoo.com', 'Yahoo');
$menu1->cargarOpcion('http://www.msn.com', 'MSN');
$menu1->mostrar();
?>
</body>
</html>
