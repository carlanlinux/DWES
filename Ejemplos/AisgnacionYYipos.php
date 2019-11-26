<?php
$a = $b = "3.1416"; // asignamos a las dos variables la misma cadena de texto
settype($b, "float"); // y cambiamos $b a tipo float
print "\$a vale $a y es de tipo ".gettype($a);
print "<br />";
print "\$b vale $b y es de tipo ".gettype($b);

$a = "3.1416";
if (isset($a)) // la variable $a está definida
    unset($a); //ahora ya no está definida
?>





