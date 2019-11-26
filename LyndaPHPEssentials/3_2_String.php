<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Variables</title>
</head>
<body>
<?php
echo "Hello World<br>";
echo 'hello World<br>';
$greeing = "Hello";
$target = "world";
$phrase = $greeing . " " . $target; // . Concatena
echo $phrase;
?>
<br>
<?php
echo "$phrase Again <br>"; //Comillas dobles coge nombres de variables separando un espacio
echo '$phrase Again <br>'; //Comillas simples no coge nombre de variables
echo "{$phrase}Again<br>"; //Pone el nombre de la variable seguido del texto

?>
<hr>
<?php
$first = "Mi mama me mima todos los días";
$second = " y cuando no me da hostias como panes";

$third = $first;
$third .= $second; //concatenar strings
echo $third;
?>
<hr>
<!--Conversión de Mayus a Minus y Vicecersa -->
Lowercase: <?php echo strtolower($third);  ?><br>
Uppercase: <?php echo strtoupper($third); ?> <br>
Uppercase first:  <?php echo ucfirst($third); ?> <br>
Uppercase words:  <?php echo ucwords($third); ?> <br>
<hr>
<!--Conversión de Mayus a Minus y Vicecersa -->
Length: <?php echo strlen($third);  ?><br>
Trim: <?php echo "A" . trim(" B C D ") . "E"; ?><br>  <!-- Quita los espacios de los lados -->
Find: <?php echo strstr($third, "hostias");  ?><br> <!--Devuelve lo que busca y todo lo que tiene detrás -->
Replace by String: <?php echo str_ireplace("mama","papa", $third);  ?><br> <!-- Buscar, reemplazar, variable -->
<br>
Repeat:  <?php echo str_repeat("$third",2);  ?><br> <!-- Repite el String -->
Make substring:  <?php echo substr($third, 8,18);  ?> <br> <!-- Corta empezando por la posición siguiente a la que se pone-->
Find position: <?php echo strpos($third, "panes");  ?> <br> <!-- Busca en el string y devuelve posición -->
Find Character: <?php echo strchr($third,"d");  ?> <br><!-- Muestra cadena desde la primera vez que aparece esa letra-->
</body>
</html>



