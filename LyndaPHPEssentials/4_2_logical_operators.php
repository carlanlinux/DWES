<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
Equal: == (igual de valor aunque sean tipos distintos)
Identical: === (igual en tipo y valor)
Compare: > < <= >= <>
Not equal: !=
Not identical: !==
And: &&
Or: ||

<?php
    $a = 4;
    $b = 3;
    $c = 20;
    $d = 1;
    if (($a > $b) && ($c > $d)){
        echo "a is larger than b AND ";
        echo "c is larger than d";
    }


?>
<br>
<?php
$a = 4;
$b = 3;
$c = 1;
$d = 20;
if (($a > $b) || ($c > $d)){
    echo "a is larger than b OR ";
    echo "c is larger than d";
}


?>
 <hr>
<?php
//Una forma de poner valores por defecto a las variables
if (!isset($e)) {
    $e = 200;
} echo $e;

?>
<hr>
<?php //Formularios para comprobar que hay algo enviado pero que no rechace cuando sea 0 o 0.0
    $quantity = 0;
    if (empty($quantity) && !is_numeric($quantity)){
        echo "Debes introducir una cantidad";
    }


?>

</body>
</html>



