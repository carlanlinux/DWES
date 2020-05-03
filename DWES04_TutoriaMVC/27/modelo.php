<?php
function getAlumnosYCursos ()
{
    /* en la función se obtienen los alumnos y cursos de la BD y se devuelve el 
     * el conjunto de resultados
     */
    $conexion = mysqli_connect("localhost", "root", "", "base1") or
    die("Problemas con la conexión");
    $conexion->set_charset("utf8");
    $registros = mysqli_query($conexion, "select alu.codigo as codigo,nombre,
                                       mail,codigocurso, nombrecurso 
                                       from alumnos as alu
                                       inner join cursos as cur on cur.codigo=alu.codigocurso") or
    die("Problemas en el select:" . mysqli_error($conexion));


    mysqli_close($conexion);
    return $registros;
}

?>
