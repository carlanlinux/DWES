<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/* forma de delimitar cadenas de texto*/
echo "<h2>Formas de delimitar cadenas de texto</h2>";
$txt = "profe";
echo "<h3>Comillas simples</h3>";
$cadena1 = 'Hola clase. Soy \'Ana\', \nla $txt del módulo "DWES"<br/>';
echo $cadena1;

echo "<h3>Comillas dobles</h3>";
$cadena2 = "Hola clase. Soy \"Ana\", \nla $txt del módulo 'DWES'<br/>";
echo $cadena2;

/*
 * Se define con in identificador precedido de los caracteres <<<,
 * y un salto de línea despuñes del nombre del identificador
 * El identificador debe aparecer tanto al principio como al final
 * de la cadena. Cuando aparece al final de la cadena, debe aparecer
 * al principio de esa línea y terminado por un ; y justo después
 * un salto de línea, si no da error.
 * También da error si la última línea está identada.
 * Si se dejan espacios a la izquierda de la cadena, estos aparecen
 * en la cadena si se accede a los caracteres como si fuera un array
 */
echo "<h3>Heredoc</h3>";
$cadena3 = <<< TEXTO1
                Hola clase. Soy "Ana", 
                \nla $txt de 'DWES' <br/>
TEXTO1;
echo "Con espacios los espacios de la izquierda al definir la "
    . "cadena con heredoc<br/>";
echo $cadena3 . "<br/>";
echo "<h3>cadena3: acceso mediante array a los caracteres de una cadena</h3>";
echo "El carácter que ocupa la posición 0 de la cadena es $cadena3[0] <br/>";

for ($i = 0; $i < strlen($cadena3); $i++)
    echo "$cadena3[$i] <br/>";

echo "Sin espacios los espacios de la izquierda al definir la "
    . "cadena con heredoc<br/>";

$cadena4 = <<< TEXTO1
Hola clase. Soy "Ana",
\nla $txt de 'DWES' <br/>
TEXTO1;
echo $cadena4 . "<br/>";
echo "<h3>cadena 4:acceso mediante array a los caracteres de una cadena</h3>";
echo "El carácter que ocupa la posición 0 de la cadena es $cadena4[0] <br/>";
echo "<hr><br/>";

for ($i = 0; $i < strlen($cadena4); $i++)
    echo "$cadena4[$i] <br/>";

echo "<hr><br/>";
?>
</body>
</html>
