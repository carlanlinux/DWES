<!DOCTYPE html>
<!-- esta vista muestra el resultado de la consulta en la que se pide el listado 
de los alumnos -->
<html>
<head>
    <meta charset="utf8"
    <title>Problema</title>
</head>
<body>
<?php if (empty($alumno))
    echo "No existe alumno con dicho mail.";
else { ?>
    <form action="" method="post">
        <input type="hidden" name="mailviejo" value="<?php echo $alumno['mail'] ?>">
        <select name="codigocurso">

            <?php
            foreach ($cursos as $curso) {
                if ($alumno['codigocurso'] == $curso['codigo']) {
                    ?>
                    <option value="<?php echo $curso['codigo']; ?>"
                            selected><?php echo $curso['nombrecurso']; ?></option>
                    <?php

                } else {
                    ?>
                    <option value="<?php echo $curso['codigo']; ?>"><?php echo $curso['nombrecurso']; ?></option>
                    <?php

                }
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Modificar">
    </form>
    <?php
}
?>
</body>
</html>