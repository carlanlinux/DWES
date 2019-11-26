<html>
<head>
    <title>Associative array</title>
</head>
<body>

<?php
$numbers = [8, 23, 15, 43, 16,4];
?>
Count: <?php echo count($numbers); ?> <br>
Max Value: <?php echo max($numbers);?> <br>
Min Value: <?php echo min($numbers);?> <br>
<hr>
<pre>

Sort: <?php sort($numbers); print_r($numbers)?> <br>
Reverse sort: <?php rsort($numbers); print_r($numbers) ?> <br>
    </pre>
Convierte un Array en String con implode. implode(separador, array)
Implode: <?php $num_String = implode(" , ", $numbers); echo $num_String; ?>

Convierte un String en un Array (ejemplo fichero separado por comas)
Explode: <?php print_r(explode(",",$num_String)); ?><hr>

Saber si está o no en un array un valor devuelve T o F
15 in array: <?php  ?> <?php  echo in_array(15, $numbers); ?> <br>
19 in array: <?php  echo in_array(19, $numbers); ?> <br>

Funciona como en JS: pop, push, sifht and sifhgt.
Random: saca algo random del array
Unique: ver si son únicos
Search: te busca la key en el array

<?php  ?>

</body>
</html>