<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>
Los arrais usan punteros que apuntan a qué valor estamos apuntando en el momento y cuál debe ir después en un loop.
En el principio el pointer siempre está en el primer lugar.

<?php
$ages = [4,8,15,16,23,42];
echo "1: " . current($ages) . "<br>"
?>

Mover el puntero al siguiente valor del array.
Similar al continue en un loop.
<?php
next($ages);
echo "2: " . current($ages) . "<br>";

next($ages);
next($ages);

echo "3: " . current($ages) . "<br>";


//Mover el puntero hacia atrás
prev($ages);
echo "4: " . current($ages) . "<br>";

//Resetear puntero valor por defecto
reset($ages);
echo "5: " . current($ages) . "<br>";

//Poner puntero elemento final
end($ages);
echo "6: " . current($ages) . "<br>";

//Sacar el puntero fuera del último elemento
next($ages);
echo "7: " . current($ages) . "<br>";

?> <br>

//El bucle while mueve el puntero del array de forma
similar a la que lo hace un for each <br>

<?php
//Cuando el next se ponga fuera del rango del array, age será null y eso es como un false
//Entonces estohará que se pause el bucle
reset($ages);
while($age = current($ages)){
    echo $age . ", ";
    next($ages);
}

?> <br>


<?php ?> <br>
</body>
</html>



