<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Array</title>
</head>
<body>
<?php
    //Crear un array vacío:
    $numers = array();

    //Crear un array y asignar valores:
    $numers = array(4,8,15,16,23,42);

    //Crear un array de forma corta:
    $array = [1,2,3];

    //Escribir en pantalla segunda posición del array:
    echo $numers[1]
?> <br>

<?php
//Crear un array con diferentes tipos, incluso otro array:
$mixed = array(6,"fox","dog",array("x","y","z"));
//Si mostramos directamente un array en echo nos da error y devuelve "Array"
echo $mixed[3];

echo $mixed[2];
echo $mixed[0];


?> <br>
<pre>
    <?php
    //Para mostrar el array con todo su contenido de forma legible usar print_r (Readable
    echo print_r($mixed);
    ?>
</pre>
<br>
Nested array: <?php
echo $mixed[3][1];
?> <br>

<?php
    //Añadir una nuevos datos en el array (Se necesita saber qué posición es la siguiente vacía)
    $mixed[4] = "cat";

    //Añadir una nuevos datos al final del array
    $mixed[] = "hourse";
?>
<pre>
    <?php
    //Para mostrar el array con todo su contenido de forma legible usar print_r (Readable
    echo print_r($mixed);
    ?>
</pre>
</body>
</html>



