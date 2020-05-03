<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/*
 * En este ejemplo se muestra cómo podemos acceder a las propiedades y
 * métodos definidos como estáticos sin necesidar de crear una instancia
 * del objeto.
 *
 * Si creamos un objeto, podemos acceder a un método estético desde la
 * instancia del objeto, pero si intentamos acceder a una propiedad
 * estática del objeto desde la instancia se produce un error.
 */
include "Coche.php";
echo "<h2>Sin crear objeto de la clase coche</h2>";
echo "Coche::RUEDAS (Constante ruedas): " . Coche::RUEDAS . "<br/>";
echo "Coche::color: " . Coche::$color . "\n<br/>"; // Muestra "rojo"
echo "Coche::mostrarColor(): " . Coche::mostrarColor() . "\n<br/>"; // Muestra "rojo"
echo "Coche::dimeColorTecho(): " . Coche::dimeColorTecho() . "<br/>"; // Muestra negro
echo "<hr><br/>";
echo "<h2>Creamos objeto coche</h2>";
$miCoche = new Coche();
echo "Podemos acceder a un método estático con la instancia: \$miCoche->mostrarColor(): "
    . $miCoche->mostrarColor() . "\n<br/>"; // Muestra "rojo"
/*
 * Una propiedad declarada como static no puede ser accedida desde una instancia,
 * si se puede desde un método estático
 */
echo "NO Podemos acceder a un atributo estático con la instancia:<br/>";
echo "\$miCoche->color:" . $miCoche->color . "\n<br/>"; // Error, propiedad color no definida
echo "<hr><br/>";

?>
</body>
</html>
