<html>
<head>
    <title>Type castng</title>
</head>
<body>
Se puede castear de dos formas:
settype($variable, "tipo") --> Cambia el tipo de lo que contiene variable
(tipo) $nombreVariable --> Como un ParseInt, mantiene tipo de variable como está pero te la devuelve
en el tipo que pongas entre paréntesis.

Tipos de datos:
string
int, integer
float
array
bool, boolean
<hr>

Type Juggling -- PHP intenta convertir él solo el tipo de datos<br>
<?php $count = "2"; ?>
gettype devuelve tipo de datos de una variable <br>
Type: <?php echo gettype($count); ?> <br>

<?php $count += 3; ?>
Type: <?php echo gettype($count) ?>
<hr>
<?php $count = "2 cats"; ?>

Type: <?php echo gettype($count); ?> <br>

<?php $count += 3; ?>
Type: <?php echo gettype($count) ?> <br>

<hr>

<?php $count = "2 cats"; ?>

Type: <?php echo gettype($count); ?> <br>

<?php $count += 3; ?>
Type: <?php echo gettype($count) ?> <br>

<?php $cats = "I have " . $count . " cats."; ?>
Cats: <?php echo gettype($cats); ?>
<hr>

Type Casting - Casteo --> Settype <br>
Se puede castear de dos formas:
settype($variable, "tipo")
(tipo) $nombreVariable

Type Casting: <?php settype($count, "integer") ?>
count <?php echo gettype($count); ?> <br>

    //Casteo con paréntesis
    <?php $count2 = (string)$count; ?>
    count: <?php echo gettype($count); ?> <br>
    count2: <?php echo gettype($count2); ?> <br>

    <hr>
    <?php $test1 = 3 ?>
    <?php $test2 = 3 ?>
    <?php settype($test1, "string") ?>
    <?php (string)$test2 ?>
    test1:  <?php echo gettype($test1); ?> <br>
    Test2: <?php echo gettype($test2); ?> <br>


    <?php ?> <br>


</body>
</html>