<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/* Este ejemplo muestra la forma de relacionar dos clases pasando como parámetro 
 * a un método de una clase un objeto de otra.        
 */
require "ClaseDos.php";
/*crea un  objetos de la ClaseDos y llama al método “multiplica”
 * pasando como parámetro un objeto de la ClaseUno que se crea en
 * ese mismo momento.
 */
$cl1 = new ClaseDos();
echo $cl1->multiplica(new ClaseUno(5, 2)) . "<br/>";
echo $cl1->multiplica(new ClaseUno(6, 7)) . "<br/>";
?>
</body>
</html>
