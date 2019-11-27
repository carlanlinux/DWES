<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
Si es una sentencia no hace falta curly braces {
Más de una sentencia usar curly braces {}
if (Expresion) sentencia;
<hr>
<?php
$a = 4;
$b = 3;

if ($a > $b) {
    echo "a es más grande que b";
} elseif ($a < $b){
    echo "a es más pequeña que b";
} else{
    echo "a es igual a b";
}

?> <br>

<?php //Only welcome new users
$new_user = true;
if ($new_user) {
    echo "<h1>Wellcome!</h1>";
    echo "<p>We are glad you decided to join us.</p>";
}
?> <br>

<?php //Don't divide by zero
$numerator = 20;
$denominator = 0;
if ($denominator > 0) {
    $result = $numerator / $denominator;
    //Ojo usar curly braces cuando queramos poner el valor de una variable en
    //un echo directamente.
    echo "Result: {$result}";
}
?> <br>

<?php ?> <br>
</body>
</html>



