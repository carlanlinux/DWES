<?php
function getAlumno ($mail)
{
    /* esta función busca en la tabla alumnos el elemento que tenga el mail
     * que llega por parámetro, devuelve al controlador el resultado de la
     * consulta. */
    $conexion = mysqli_connect("localhost", "root", "", "base1") or
    die("Problemas con la conexión");

    $registros = mysqli_query($conexion, "select * from alumnos
                                where mail='$mail'") or
    die("Problemas en el select:" . mysqli_error($conexion));

    $registro = mysqli_fetch_array($registros);
    mysqli_close($conexion);
    return $registro;
}

function getCursos ()
{
    /* obtiene los cursos de la tabla cursos y devuelcve al controlador
     * el resultado de la consulta */
    $conexion = mysqli_connect("localhost", "root", "", "base1") or
    die("Problemas con la conexión");


    $registros = mysqli_query($conexion, "select * from cursos") or
    die("Problemas en el select:" . mysqli_error($conexion));

    mysqli_close($conexion);
    return $registros;
}

function updateAlumno ($mailviejo, $codigocurso)
{
    /* 
     * actualiza el curso en la tabla.
     */
    $conexion = mysqli_connect("localhost", "root", "", "base1") or
    die("Problemas con la conexión");

    $registros = mysqli_query($conexion, "update alumnos
                            set codigocurso=$_REQUEST[codigocurso]
                            where mail='$_REQUEST[mailviejo]'") or
    die("Problemas en el select:" . mysqli_error($conexion));

    mysqli_close($conexion);
}

?>
