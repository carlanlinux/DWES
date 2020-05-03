<!DOCTYPE html>
<html>
<head>
    <meta charset=UTF-8">
    <title>Desarrollo Web</title>
</head>
<body>
<?php
/* Al no comprobar si un elemento del array existe antes de asignarle
 * su valor a una variable, si en el formulario pulsamos el botón enviar
 * sin haber rellenado ningún campo del formulario daría error. Por eso
 * es  importante la validación y comprobación de los datos tanto en el
 * cliente como en el servidor
 *
 * Ahora recibimos todos los checkbox que han sodo seleccionados en el
 * formulario, pero no necesitamos saber el name de cada uno de ellos,
 * podemos recorrer el array e seleccionados con un bucle foreach. El
 * código así es más limpio.
 */
$nombre = $_POST['nombre'];
$ciclos = $_POST['ciclos'];
print "Nombre: " . $nombre . "<br />";
foreach ($ciclos as $modulo) {
    print "Modulo: " . $modulo . "<br />";
}
?>
</body>
</html>
