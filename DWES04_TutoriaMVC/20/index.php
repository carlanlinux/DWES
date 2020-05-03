<?php
/* controlador: comprueba si ha llegado algo por $_REQUEST, en caso contrario 
 * muestra la vista inicial
 * - buena praxis anteponer o añadir al nombre del archivo identificativo de lo 
 * que es, por ejemplo vista o V M C
 * - separar en carpetas 
 */
require_once('modelo.php');

if (isset($_REQUEST['nombre'])) {
    $alumno['nombre'] = $_REQUEST['nombre'];
    $alumno['mail'] = $_REQUEST['mail'];
    $alumno['codigocurso'] = $_REQUEST['codigocurso'];
    //la función altaAlumno está en el modelo
    altaAlumno($alumno);
    /*después de añadir al alumno se incluye la otra vista. sería mejor require_once
     * podría gestionar el mensaje a mostrar metiéndolo en una variable.
     */
    require('vistares.php');
} else {
    // con require se incluye el fichero a partir de este punto.
    require('vistaform.php');
}
?>
