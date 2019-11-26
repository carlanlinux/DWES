<html>
<head>
    <title>Constantes</title>
</head>
<body>
Se escriben en mayúsculas, no tienen $ delante de ellas.
Sólo se puede dar un valor a una constante con la función define.

<?php
$max_width = 900; //No es una constante
// MAX_WIDTH = 900;  No funciona! No se puede usar = para asignar

define("MAX_WIDTH", 900); //Hay que usar comillas para definirla, luego no hace falta
//Una vez que se define no se puede volver a definir usando define function.
echo MAX_WIDTH;

?> <br>

<?php  ?> <br>

</body>
</html>
