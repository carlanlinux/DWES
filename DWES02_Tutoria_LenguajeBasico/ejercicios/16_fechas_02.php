<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        body {
            font-size: 20px;
            margin: 50px;
        }
    </style>
</head>
<body>
<?php
/*
 * La función getDate() obtiene un array asociativo con la información
 * de la fecha y hora del servidor.
 */
echo "<h2>Ejemplo getDate()</h2>";
$hoy = getdate();
print_r($hoy);
echo "<hr><br/>";

/*
 * date() obtiene una cadena de texto a partir de la fecha que se le
 * pase por parámetro. Recibe dos parámetros:
 * el primero es la descripción del formato que va a tener la cadena que
 * devuelve, y el segundo, opcional es una marca de tiempo. Si no se
 * indica toma la fecha y hora actual (DEL SERVIDOR)
 * NOTA: los nombres de los días de la semana y del mes los muestra en
 * inglés
 */

echo "<h2>Ejemplo date() </h2>";
echo "date('Y')= año: " . date("Y") . "<br />";
echo "date('l') = nombre del día:  " . date("l") . "</br>"; //es una L minúscula
echo "date('Y/m/d') = fecha en formato año/mes/día: " . date("Y/m/d") . "<br>";
echo "date('d M y') = fecha en formato día, iniciales mes, año (dos dígitos): " . date("d M y") . "<br />";
echo "date('d/m/Y') = fecha en formato día/mes/año: " . date("d/m/Y") . "<br/>";
echo "date('d/m/Y h:i:s') = fecha en formato día/mes/año hora:minuto:segundos (hora en formato de 01 a 12): " . date("d/m/Y h:i:s") . "<br />";
echo "date('H:i:s') = hora:minuto:segundos (hora en formato de 00 a 23): " . date("H:i:s") . "<p />";
echo "<hr><br/>";
/*
 * la función time devuelve la hora en formato UNIX
 * La función strtotime convierte una descripción de fecha/hora textual
 * en inglés a fecha UNIX
 */
echo "<h2>Ejemplo time()</h2>";
echo "Función time(): " . time() . "<br />";
$semanaSiguiente = time() + (7 * 24 * 60 * 60); // 7 días; 24 horas; 60 minutos; 60 segundos
echo "Hoy es date('Y-m-d'): " . date('Y-m-d') . "<br/>";
echo "La semana que viene desde hoy es date('Y-m-d',(time() + (7 * 24 * 60 * 60))) : " . date('Y-m-d', $semanaSiguiente) . "<br/>";
echo "<hr><br/>";

/*
 * La función mktime(hora,minuto,segundo,mes,dia,año) devuelve una
 * determinada fecha en dormato UNIX
 * si introducimos 0 como valor del parámetro del día tomará el último
 * día del mes anterior, y si introducimos 0 como valor del parámetro
 * mes se tomará el último mes del año anterior.
 */
echo "<h2>Ejemplo mktime()</h2>";
echo "Función mktime(20 ,21, 22, 6, 14, 2011): " . mktime(20, 21, 22, 6, 14, 2011) . "<br />";
echo "Fecha anterior en formato entendible: date('d/m/Y', mktime(20 ,21, 22, 6, 14, 2011)) = " . date("d/m/Y", mktime(20, 21, 22, 6, 14, 2011)) . "<br />";
echo "Fecha anterior pasándole la marca de tiempo date('d/m/Y', 1308079282) =  " . date("d/m/Y", 1308079282) . "<br/>";
echo "Pasando un 0 como valor del parámetro día: date('d-m-Y', mktime(0, 0, 0, 7, 0, 2000))= " . date("d-m-Y", mktime(0, 0, 0, 7, 0, 2000)) . "<br />";
echo "Pasando un 0 como valor del parámetro mes: date('d-m-Y', mktime(0, 0, 0, 0, 15, 2000))= " . date("d-m-Y", mktime(0, 0, 0, 0, 15, 2000)) . "<br />";
echo "El día: date('d-m-Y', mktime(0, 0, 0, 20, 7, 1999)) fue  " . date("l", mktime(0, 0, 0, 7, 20, 1999)) . "<br />";
echo "<hr><br/>";

/* con date_default_timezone_set() podemos establecer la zona horaria
 * por defecto para todas las funciones de fecha/hora que usemos en
 * nuestro script.
 * NOTA: no se puede cambiar la hora en un reloj de un servidor compartido,
 * pero sí podemos cambiar la zona horaria que se muestra
 * En el ejemplo establecemos la zona horaria de Nueva york y mostramos
 * la hora.
 * A continuación volvemos a establecer la zona horaria de Madrid y
 * mostramos al fecha y la hora
 */
echo "<h2>Ejemplo date_default_timezone_set</h2>";
echo "<a href='https://www.php.net/manual/es/timezones.php'>Zonas horarias
                admitidas</a><br/><br/>";
date_default_timezone_set("America/New_York");
echo "En Nueva york son las " . date("H:i:sa") . " del día " . date("d F y") . "<br />";
date_default_timezone_set("Pacific/Auckland");
echo "Auckland (Nueva Zelanda) son las " . date("H:i:sa") . " del día " . date("d F y") . "<br />";
date_default_timezone_set("Europe/Madrid");
echo "En Madrid son las " . date("H:i:sa") . " del día " . date("d F y") . "<br />";
echo "<hr><br/>";

?>

<!-- Ejemplo uso copyright-->
DAW &copy; <?php echo date("Y"); ?>
</body>
</html>
