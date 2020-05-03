<?php
require_once('modelo.php');
/* si ha introducido un email busca el alumno y los cursos que hay para que
 * cambie el curso en el que está matriculado y muestra la vista con los
 * resultados.
 * Si lo que llehga es el elemento "codigocurso" actualiza el curso del
 * alumno y muestra otra vista de resultados.
 */
if (isset($_REQUEST['mail'])) {
    //guarda en la variable $alumno lo que le devuelve la función.
    $alumno = getAlumno($_REQUEST['mail']);
    $cursos = getCursos();
    require('vistares.php');
} else if (isset($_REQUEST['codigocurso'])) {
    updateAlumno($_REQUEST['mailviejo'], $_REQUEST['codigocurso']);
    require('vistares2.php');
} else
    require('vistaform.php');
?>
