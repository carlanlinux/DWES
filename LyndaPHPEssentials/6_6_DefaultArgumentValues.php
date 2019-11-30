<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Default Argument Values</title>
</head>
<body>
Si no se le da un valor al llamar a la función, se coge un valor por defecto si se hace una asignación en la función.
<hr>
<?php
//ini_set('display_errors','On');
//error_reporting(E_ALL);

function paint($room= "office", $color = "red"){
    return "The color of the {$room} is {$color}. <br>";
}
echo paint();
echo paint("bedroom", "blue");
echo paint("bedroom", null); //Ojo si mandas null no coge el valor por defecto. No enviar nada no es lo mismo a
//Enviar nada.

function paint2($room, $color)
{
    return "The color of the {$room} is {$color}. <br>";
}
echo paint2();


?>
<?php ?>
<br>
</body>
</html>
