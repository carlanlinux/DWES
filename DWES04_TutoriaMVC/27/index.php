<?php
require_once('modelo.php');
/* la función getAlumnosYCursos está en el modelo
 * guardamos los datos en un array y mostramos la vista
 */
$alumnos = getAlumnosYCursos();
require('vista.php');
?>
