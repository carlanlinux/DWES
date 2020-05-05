<?php
/*4) Simula tiradas de un dado
• Escribe un programa PHP permita al usuario introducir el número de tiradas de un dado, siempre igual o mayor que 1 y que se dirija a otro script al pulsar el botón submit del formulario en el que se realizará la simulación de tiradas.
• Si se envía el formulario vacío se redigirá al primer fichero.
• En el segundo fichero, el programa simulará el lanzamiento del dado tantas veces como se
haya indicado en el formulario, y mostrará por pantalla los números del dado que han salido
y cuantas veces se ha obtenido cada número en orden ascendente.
• La forma de simular el lanzamiento de un dado se hará utilizando la función mt_rand(int
$min, int $max) que genera un número aleatorio entre un mínimo y un máximo.*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tiradas de dados</title>
</head>
<body>
<h1>Introducir número de tiradas</h1>
<form name="tiradas" action="1_4_TiradasDado_script.php" method="post">
    <label for="tiradas">Número de tiradas</label>
    <input id="tiradas" type="number" name="tiradas" min="1" required>
    <input type="submit">
</form>
<?php

?>
 <br>
</body>
</html>



