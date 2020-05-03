<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h2>Switch</h2>
<?php
$diaSemana = rand(1, 7);
switch ($diaSemana) {
    case 1:
        echo "Qué rollo empieza la semana<br/>";
    case 2:
        echo "todavía martes<br/>";
        break;
    case 3:
    case 4:
    case 5:
        echo "Hay clase";
        break;
    case 6:
        echo "por fin sábado<br/>";
    case 7:
        echo "No hay clase<br/>";
        break;
    default:
        echo "???";
        break;
}
?>
</body>
</html>
