<?php
/* El ejemplo muestra en pantalla el identificación de sesión que 
 * se nos ha asignado, el nombre de la sesión (que es el nombre de la 
 * cookie que se usa para guardar el identificador de sesión) y los parámetros
 * de la cookie que guarda el identificador de sesión.
 */
session_start();
echo 'session_id(): ' . session_id();
echo "<br />\n";
echo 'session_name(): ' . session_name();
echo "<br />\n";
print_r(session_get_cookie_params());
?>