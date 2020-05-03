<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web</title>
</head>
<body>
<?php
// si es true el botón del formulario se ha pulsado
if (isset($_POST['enviar'])) {
    if (!empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];

    } else
        $nombre = "no ha introducido ningún nombre";
    print "Nombre: " . $nombre . "<br />";
    if (!empty($_POST['modulos'])) {
        $modulos = $_POST['modulos'];
        foreach ($modulos as $modulo) {
            print "Modulo: " . $modulo . "<br />";
        }
    } else {
        $modulos = "Modulos: no ha seleccionado ningún módulo";
        print $modulos;
    }
} /* fíjate que aquí el formulario va incluido dentro de un else
             * de PHP. Por tanto el formulario solo aparecerá en caso de 
             * que se ejecute ese else que será cuando no se ha pulsado el
             * botón enviar
             */
else {
    ?>
    <form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>"
          method="post">
        Nombre del alumno: <input type="text" name="nombre"/><br/>
        <p>Módulos que cursa:</p>
        <input type="checkbox" name="modulos[]" value="DWES"/>
        Desarrollo web en entorno servidor<br/>
        <input type="checkbox" name="modulos[]" value="DWEC"/>
        Desarrollo web en entorno cliente<br/>
        <br/>
        <input type="submit" value="Enviar" name="enviar"/>
    </form>
    <?php
}
?>
</body>
</html>
