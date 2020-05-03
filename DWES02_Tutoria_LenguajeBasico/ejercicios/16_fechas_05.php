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
/* función que recibe una marca de tiempo y una cadena de caracteres
 * que representa una fecha.
 * Aplica la función strftime() para mostrarla en español
 */
function muestra ($marca)
{
    setlocale(LC_TIME, "es_ES.UTF-8");
    /* se muestra en castellano gracias a setlocale
       en plataformas windows                          */
    echo strftime("El día es %A, %d  de %B de %Y", $marca) . "<br/>";
    echo strftime("Son las %I:%M:%S %a", $marca) . "<br>";
    echo "con date: " . date("l-F-Y", $marca) . "<hr><br>";

}

/*
 * Obtenemos la marca de tiempo de una fecha determinada
 * mediante una cadena de caracteres con el formato día, nombre
 * del mes  y año
 */

echo "<h2>Uso de strftime()</h2>";
echo "<a href='https://www.php.net/manual/es/function.strftime.php'>
                Ver strftime en la documentación </a><br/><br/>";
$fecha = "31 january 2005"; // Se escribe en inglés
$marcaTiempo = strtotime($fecha);
echo "Fecha: $fecha, marca de tiempo: $marcaTiempo<br/><br/>";
muestra($marcaTiempo);

$fecha = "14 marzo 1970"; // Si escribe en español no calcula la marca
$marcaTiempo = strtotime($fecha);
echo "Fecha: $fecha, marca de tiempo: $marcaTiempo<br/><br/>";
muestra($marcaTiempo);

// Aquí se obtiene la marca de tiempo de una fecha y hora
// que se especifica mediante una cadena de caracteres con
// el formato mm/dd/aaaa hh:mm:ss
$fecha = "2/14/1970 12:17:45"; // Se escribe en formato inglés
$marcaTiempo = strtotime($fecha);
echo "Fecha: $fecha, marca de tiempo: $marcaTiempo<br/><br/>";
muestra($marcaTiempo);

// Aquí se obtiene la marca de tiempo de una fecha
// aplicando la aritmética de fechas. Se toma como base
// la fecha actual del sistema y se obtiene la marca del
// día siguiente a la misma hora
echo "Tomo como base el día de hoy<br/>";
// Se escribe en inglés
$fecha = "+1 day";
$marcaTiempo = strtotime($fecha);
echo "Fecha: $fecha, marca de tiempo: $marcaTiempo<br/><br/>";
muestra($marcaTiempo);

// Aquí se obtiene la marca de tiempo de una fecha
// aplicando la aritmética de fechas. Se toma como base
// la una fecha cualquiera y se obtiene la marca del
// día y hora indicado por la cadena $fecha
// Se escribe en inglés: formato
//  ±xx month ±yy day ±zz year ±aa hour ±bb minute ±cc second
$fecha = "2 month 1 days -1 years +2 hours 3 minutes
                     -10 seconds";
echo "Tomo como base ";
$marcaTiempo = strtotime($fecha);
echo "Fecha: $fecha, marca de tiempo: $marcaTiempo<br/><br/>";
muestra($marcaTiempo);
?>
</body>
</html>
