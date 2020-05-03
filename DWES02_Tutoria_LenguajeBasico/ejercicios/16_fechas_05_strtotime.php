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
 * La función strtotime convierte una descripción de fecha/hora textual
 * en inglés a fecha UNIX
 */
echo "<h2>Ejemplo strtotime()</h2>";
echo "Hoy strtotime('now'): " . strtotime("now") . "<br/><br/>";
echo "Hoy date('d-m-Y', strtotime('now')): " . date("d-m-Y", strtotime("now")) . "<br/><br/>";
echo "Mañana date('d-m-Y', strtotime('+1 day')): " . date("d-m-Y", strtotime("+1 day")) . "<br/><br/>";
echo "Semana que viene date('d-m-Y', strtotime('+1 week')): " . date("d-m-Y", strtotime("+1 week")) . "<br/><br/>";
echo "Dentro de una semana, 2 días, 4 horas y 2 segundos date('d-m-Y', strtotime('+1 week 2 days 4 hours 2 seconds')): " . date("d-m-Y", strtotime("+1 week 2 days 4 hours 2 seconds")) . "<br/><br/>";
echo "Próximo jueves date('d-m-Y', strtotime('next Thursday')): " . date("d-m-Y", strtotime("next Thursday")) . "<br/><br/>";
echo "pasado Lunes date('d-m-Y', strtotime('last monday')): " . date("d-m-Y", strtotime("last monday")) . "<br/><br/>";

echo "Marca de tiempo de la fecha 1996-09-21 = " . strtotime("2011-10-22") . "<br/><br/>";
echo "Marca de tiempo de la fecha 1996-09-21  a las 13:25:05 = " . strtotime("2011/10/22 13:25:05") . "<br/><br/>";
echo "<hr><br/>";

/*
 * strtotime tiene flexibilidad en la entrada de parámetros.
 * En el ejemplo mostraremos las fechas de los próximos 6 sábados
 * Primero cogemos la marca de tiempo del ptróximo
 * Después cogemos la marca de tiempo de la fecha sobre la que queremos
 * calcular las  semanas
 * Finalmente mediente un bucle while se muestran las fechas añadiendo
 * al final del bucle 1 semana a la fecha de inicio
 * El bucle termina cuando se llega a la fecha final
 */
echo "<h2>Ejemplo strtotime() que muestra las fechas de los próximos "
    . "6 sábados</h2>";

$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks", $startdate);
/* este ejemplo muestra las fechas para los próximos 6 sábados*/
while ($startdate < $enddate) {
    echo date("l d M", $startdate) . "<br>";
    $startdate = strtotime("+1 week", $startdate);
}

?>
</body>
</html>
