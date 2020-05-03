<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require 'CocheDeLujo.php';
$coche = new CocheDeLujo();
/* Accedemos a los métodos públicos de la clase que hereda*/
echo "<h2> Accedemos a los métodos públicos de la clase que hereda</h2>";
echo "displayMarca: " . $coche->displayMarca() . "<br/>";
echo "displayPotencia: " . $coche->displayPotencia() . "<br/>";
echo "<hr>";
echo "<h2> Accedemos a los métodos públicos de la clase padre</h2>";
$coche->setColor("ROSA");
echo "getColor de la clase padre desde la clase heradada: " . $coche->getColor() . "<br/>";
//Dará error porque coche es un atributo privado
echo "<hr>";
echo "<h2> Intentamos acceder al atributo privado color desde la clase heredada<br>"
    . " </h2>";
echo "<p> da error porque estamos intentando acceder directamente al "
    . "atributo privado, deberíamos usar un método de la clase padre para hacer eso</p>";
echo "Color intentando llamar al método displayColor(): " . $coche->displayColor() . "<br/>";
/* de esta forma no da error, ya que desde CocheDeLujo accede a
 * un método privado. Muestra
 */
echo "<hr>";
echo "<h2> Accedemos al color desde la clase heredada <br>usando un método de "
    . " la clase padre</h2>";
echo "Color intentando llamar al método dameColor(): " . $coche->dameColor() . "<br/>";
echo "<hr>";
echo "<h2> Accedemos desde la clase heredada a un método y atributo "
    . "protected de la clase padre</h2>";
$coche->cambiaEstado();
?>
</body>
</html>
