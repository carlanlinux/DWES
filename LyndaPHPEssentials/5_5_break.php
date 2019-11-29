<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>
Break: Pausa todo lo que haya dentro del loop.
Puede ser util para el caso que buscas alguien en un registro y en el momento que lo encuentres poner break, así no
tienes que recorrerte toda la lista de forma innecesaria.


<?php
for ($count = 0; $count <= 10; $count++)
{
    if ($count == 5) {
        break;
    }
    echo $count . ", ";
}
?>
<hr>
Por defecto break viene con argumento 1. Si estamos en un bucle dentro de otros buchles y  queremos parar más bucles
habría que indicar con un entero el número de  bucles del que queremos que saga.
<?php // loop inside a loop with break

for ($i=0; $i<=5; $i++) {
    if ($i % 2 == 0) { continue(1); }
    for ($k=0; $k<=5; $k++) {
        if ($k == 3) { break(2); }
        echo $i . "-" . $k . "<br />";
    }
}

?>

<?php ?> <br>
</body>
</html>



