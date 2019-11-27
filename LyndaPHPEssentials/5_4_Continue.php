<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>

<?php
//Para las acciones del loop actual que tenga por debajo y va a la evaluación de la siguiente iteración sin ejectuar lo que tiene que hacer en la suya
 for($count = 0; $count < 10; $count++){
     if ($count % 2 == 0){
         continue;
     }
     echo $count . ", ";
 }
?>
<hr>
<?php  // OJO!! Si pongo aquí el continue me crea un bucle infinito porque nunca me suma!!
    $count = 0;
    while ($count <= 10) {
        if ($count == 5) {
            echo 1;
            //continue;
        }
        echo $count . ", ";
        $count++;
    }
?> <br>

<hr>
<?php   //Habría que usarlo asi, poniendo el ++ antes del continue
$count = 0;
while ($count <= 10) {
    if ($count == 5) {
        $count++;
        continue;
    }
    echo $count . ", ";
    $count++;
}
?> <br>

Cuando tenemos un bucle dentro de otro y queremos hacer un continue no sólo del blucle en el que está sino también del
que lo engloba usamos un argumento entero. Por defecto cuando ponemos continue aunque no se ve tiene como argumento 1.
Si estamos dentro de otro loop podemos querer que se salte los dos loop y entonces usamos continue(2)
<?php // loop inside a loop with continue

for ($i=0; $i<=5; $i++) {
    if ($i % 2 == 0) { continue(1); }
    for ($k=0; $k<=5; $k++) {
        if ($k == 3) { continue(2); }
        echo $i . "-" . $k . "<br />";
    }
}

?>

<?php ?> <br>
</body>
</html>



