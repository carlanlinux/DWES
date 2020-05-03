<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/*
 * Creamos un objeto de tipo página al que se le pasa como parámetro
 * el texto que va a aparecer en la cabecera y en el pie de la página.
 * A continuación, mediente un bucle, llama al método insertarCuerpo
 * que va añadiendo elementos en un array, cada uno con eltexto que se
 * indica.
 */
require 'Pagina.php';
$pagina1 = new Pagina('Título de la Página', 'Pie de la página');
for ($i = 0; $i < 10; $i++)
    $pagina1->insertarCuerpo("$i) Esto es un texto del cuerpo de la página");
$pagina1->mostrar();
?>
</body>
</html>
