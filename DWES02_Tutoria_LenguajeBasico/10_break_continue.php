<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
$i = 0;
while ($i < 10) {
    $i++;
    if ($i % 2) {
        echo "i = " . $i . " vuelve al inicio del bucle<br/>";
        continue;
    }
    for ($j = $i; $j < 10; $j++) {
        if ($j % 2 == 0) { //si j es impar
            echo "i=" . $i . ", j=" . $j . ", es par sale del bucle FOR<br/>";
            break;
        }
    }
    echo "Primera instrucción después del bucle FOR\n<br/>";
    if (($i == 6) || ($i == 7) || ($i == 8)) {
        echo "i= " . $i . ", sale del bucle while<br/>";
        break;
    }

} // del while
echo "Ha salido del bucle WHILE- fin del programa\n<br/>";
?>
</body>
</html>
