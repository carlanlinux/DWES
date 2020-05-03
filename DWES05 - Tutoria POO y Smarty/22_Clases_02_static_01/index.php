<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include 'Vehiculo.php';

// invoca al método estático promoción descuento (al ser estático
// no es necesario que exista una instancia). El método asignará
// un valor a la propiedad estática "descuento" si la fecha actual
// es mayor a una fecha determinada, por ejemplo durante una
// campaña promocional
Vehiculo::promocion_descuento();

// Creamos un objeto de la clase Vehiculo pasándole el parámetro "compacto"
// Configuramos el vehículo indicando el color de la tapicería.
// Por último invocamos al método "precio_final" para que nos
// muestre el precio del vehículo tal y como lo hemos configurado.

$cliente_Pepe = new Vehiculo("compacto");
$cliente_Pepe->tapiceria_cuero("rojo");
echo $cliente_Pepe->precio_final() . "<br/>";

//Creamos un objeto de la clase Vehiculo pasándole el parámetro "compacto"
// Configuramos el vehículo indicando el color de la tapicería y que
// queremos climatizador.
// Por último invocamos al método "precio_final" para que nos
// muestre el precio del vehículo tal y como lo hemos configurado.

$cliente_Clara = new Vehiculo("compacto");
$cliente_Clara->tapiceria_cuero("blanco");
$cliente_Clara->climatizador();
echo $cliente_Clara->precio_final() . "<br/>";
?>
</body>
</html>
