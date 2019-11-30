<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>First Page</title>
</head>
<body>
URL Sin codificar y mandamos todo normal<br>
<a href="10_02_second_tpage.php?id=1&name=kevin">Second Page</a><hr>

URL Codificada para poder enviar caracteres especiales sin que de problemas <br>
Necesitamos poner un echo y la función de urlenconde
<a href="10_02_second_tpage.php?id=1&name=<?php echo urlencode("kevin&");?>&id=42">Second Page</a> <hrr>

//Apache tiene una forma de codificar los espacios 20% que no tiene por qué entenderla todos los servidores, por eso cuando
haya que hacer un get (enviando datos en link después de una ?) tenemos que hacer nuestro encode para asegurarnos que
    lo interpreta bien nuestro servidor <br>
<br><a href="10_02_second_tpage.php?id=1&name=pepito palotes&id=42">Second Page</a>
<br><a href="10_02_second_tpage.php?id=1&name=<?php echo urlencode("Pepito de los palotes"); ?>&id=42">Second Page</a>
<?php

?>
<?php ?> <br>
</body>
</html>



