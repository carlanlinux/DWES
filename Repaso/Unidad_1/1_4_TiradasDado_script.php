<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tiradas de dados</title>
</head>
<body>
<h1>Resultado lanzamiento dados</h1>
<?php
    //El número de tiradas es igual a post tiradas, si recibe nada no es null
 $numtiradas = filter_var($_POST['tiradas']) ?? NUll;
 $resultadoTiradas = [];
 if ($numtiradas == null){
     header("Location: " . "1_4_TiradasDado_indez.php");
     exit;
 }
 for ($i = 0; $i < $numtiradas; $i++){
     $random = mt_rand(1,6);
     array_push($resultadoTiradas, $random);
         echo $random . "<br>";
 }
 echo "<h1>Resumen de las tiradas</h1>";
    //array_count_values: Cuenta cuántas veces existe un valor en un array y devuelve un array asociativo para acceder a él.
// Si lo queremos orednado de mayor menor aplicamos antes el sort o si lo queremos de menor a mayor el método rsort.
    $contadorValores = array_count_values($resultadoTiradas);
    sort($contadorValores);

    foreach ($contadorValores as $numdado => $numeroRepetido){
        echo "El núermo " . $numdado . " ha salido " . $numeroRepetido . " veces<br>";
    }

?>
<?php ?> <br>
</body>
</html>



