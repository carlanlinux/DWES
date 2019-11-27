<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Switch case </title>
</head>
<body>
//Útil cuando se sabe una lista de casos definidos que pueden ocurrir y qué hacer en cada uno de ellos.
<br>

<?php
//IMPORTANTE: TE EJECUTA LA SENTENCIA QUE CUADRA CON EL CASE PERO SI NO HAY UN BREAK
//SIGUE EJECUTANDO TODAS LAS SENTENCIAS QUE TENGA POR DEBAJO!!! ACORDARSE DE PONER BREAK;
    $a = 0;
    switch ($a) {
        case 0:
            echo "a equals 0<br>";
            break;
        case 1:
            echo "a equals 1<br>";
            break;
        case 3:
            echo "a equals 3<br>";
            break;
        default:
            echo "a is not a 0, 1 or 3";
            break;
    }
?>

<?php
//Típico caso de uso de switch case
// ChineseZodiac
// whitespace doesn't matter
// colons, semicolons and breaks do
$year = 2013;
switch (($year - 4) % 12) {
    case  0: $zodiac = 'Rat';     break;
    case  1: $zodiac = 'Ox';       break;
    case  2: $zodiac = 'Tiger';   break;
    case  3: $zodiac = 'Rabbit';   break;
    case  4: $zodiac = 'Dragon';   break;
    case  5: $zodiac = 'Snake';   break;
    case  6: $zodiac = 'Horse';   break;
    case  7: $zodiac = 'Goat';     break;
    case  8: $zodiac = 'Monkey';  break;
    case  9: $zodiac = 'Rooster'; break;
    case 10: $zodiac = 'Dog';     break;
    case 11: $zodiac = 'Pig';     break;
}
echo "{$year} is the year of the {$zodiac}.<br />";
?>

<?php // case with multiple values
/*Cuando se quieren hacer que múltiples valores hagan lo mismo se les pone juntos
estos case el primero sin ninguna otra sentencia para que pase por él y el último que
tenga el break sea quien lo ejecute. */
$user_type = 'customer';

switch ($user_type) {
    case 'student':
        echo "Welcome!";
        break;
    case 'press':
    case 'customer':
    case 'admin':
        echo "Hello!";
        break;
}
?>

<?php ?> <br>
</body>
</html>



