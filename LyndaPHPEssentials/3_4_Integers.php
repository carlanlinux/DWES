<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
    $var1 = 3;
    $var2 = 4;
?>
Basic Math:  <?php echo ((1 + 2 + $var1) * $var2) / 2 - 5; ?> <br>
Absolute value:  <?php echo abs(0-300) ; ?> <br>
Exponential: <?php echo pow(2,8); ?> <br>
Square root: <?php echo sqrt(100); ?> <br>
Modulo: <?php echo fmod(20,7); ?> <br>
Random: <?php echo rand(); ?> <br>
Random (min, max) <?php echo rand(1,10); ?> <br>
<hr>
+= : <?php $var2 += 4; echo $var2 ?> <br>
-= : <?php $var2 -= 4; echo $var2; ?> <br>
*= : <?php $var2 *= 3; echo $var2; ?> <br>
/= : <?php $var2 /= 4; echo $var2; ?> <br>
<br>
Increment: <?php $var2++; echo $var2; ?> <br>
Decrement: <?php $var2--; echo $var2; ?> <br>
<br>
//OJO: tras el signo + PHP intentará convertir lo que siga a número para hacer la suma, no concatena
<?php  echo 1 + "2 houses"; ?> <br>

</body>
</html>



