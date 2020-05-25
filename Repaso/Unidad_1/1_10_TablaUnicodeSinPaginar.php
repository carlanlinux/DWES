<!--
Crear una página PHP que muestre por pantalla los caracteres de la tabla Unicode del 0 al 50.000 en una tabla de 16 columnas.
• S escribimos &# seguido de un número y del símbolo punto y coma, nos muestra el carácter Unicode correspondiente a ese
números. Así el código &#241; en una página web muestra el carácter ñ.
• Haz que la tabla anterior se pueda mostrar paginada. De forma que en cada pantalla se muestren 500 códigos y unos
enlaces permitan pasar a la siguiente página.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Página de cálculo</title>
</head>
<?php
define('NUMCOLUMNAS', 16);
define('NUMCODIGOS', 50000);
define('PAGINADO', 500);
?>
<body>
<table>
<tr><th>Código</th><th>Valor</th><th>Código</th><th>Valor</th><th>Código</th><th>Valor</th><th>Código</th><th>Valor</th>
    <th>Código</th><th>Valor</th><th>Código</th><th>Valor</th><th>Código</th><th>Valor</th><th>Código</th><th>Valor</th></tr>
    <?php
        //Hacemosun bucle con dos variables para que sumen tanto al i como al número de columnas
        for ($i=0, $col=1; $i<NUMCODIGOS; $i++, $col++ ){
            //Si la columna es 9 ya nos hemos pasado y volvemos a poner el número de columnas a 1 para empezar
            if ($col > NUMCOLUMNAS/ 2) $col = 1;
            //si la columna es igual a 1 entonces empezamos a pintar el tag <td> antes
            if ($col == 1) echo "<tr>";
            //Pintamos todas las celdas
            echo "<td class='codigo'>$i</td><td>" . "&#".$i ."</td>";
            //En la ultima columna pintamos el cierre de la fila
            if ($col == NUMCOLUMNAS/2 ) echo "</tr>";
        }
    ?>
</table>
</body>
</html>