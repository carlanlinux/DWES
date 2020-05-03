<?php
/*incluimos el fichero pag1.php que define una variable $i
 * y la mostramos en pantalla
 */
include "pag1.php";
print "<p>Ahora \$i vale $i</p>\n";
/*incluimos el fichero pag2.php que suma 10 a la variable $i
 * y la mostramos en pantalla
 */
include "pag2.php";
print "<p>Ahora \$i vale $i</p>\n";
/*incluimos de nuevo el fichero pag2.php que suma 10 a la variable $i
 * y la mostramos en pantalla
 */
include "pag2.php";
print "<p>Ahora \$i vale $i</p>\n";

if ($i > 0) {
    echo "if";
    require "pag2.php";
} else
    require "pag1.php";
print "<p>Ahora \$i vale $i</p>\n";

?>


