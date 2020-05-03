<!DOCTYPE html>
<!-- esta vista muestra los resultados devueltos por el modelo al controlador 
Observa el poco codigo PHP que hay-->
<html>
<head>
    <meta charset="utf8"
    <title>Problema</title>
</head>
<body>
<?php foreach ($alumnos as $alumno) { ?>
    <br>
    Codigo: <?php echo $alumno['codigo']; ?><br>
    Nombre: <?php echo $alumno['nombre']; ?><br>
    Mail: <?php echo $alumno['mail']; ?><br>
    Curso: <?php echo $alumno['nombrecurso']; ?><br>
    <hr>
<?php } ?>
</body>
</html>