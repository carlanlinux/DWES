<?php
/* el modelo contiene una única función que da de alta a un alumno a un curso*/
function altaAlumno ($alumno)
{
    $conexion = mysqli_connect("localhost", "root", "", "base1") or
    die("Problemas con la conexión");
    /* para que el ejemplo fuera completo habría que comprobar si el alumno
     * existe antes de darlo de alta. Y devolver si ya existía o es correcto.
     */
    mysqli_query($conexion, "insert into alumnos(nombre,mail,codigocurso) values '"
        . "$alumno[nombre]','$alumno[mail]',$alumno[codigocurso])")
    or die("Problemas en el select" . mysqli_error($conexion));
    mysqli_close($conexion);
}

?>
