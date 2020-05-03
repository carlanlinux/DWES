<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/*si todo ok muestra los datos, es decir si ha rellenado el campo nombre
 * y ha marcado algún checkbox
 */
if (!empty($_POST['modulos']) && !empty($_POST['nombre'])) {
    print "Nombre: " . $_POST['nombre'] . "<br />";
    foreach ($_POST['modulos'] as $modulo) {
        print "Modulo: " . $modulo . "<br />";
    }
} /*si hay errores repinta el formulario conservando los datos que hubiera
         * rellenado
         * Si el nombre no tiene nada lo pone vacío para que no de error al 
         * poner el value del nombre 
         */
else {
    if (empty($_POST['nombre']))
        $_POST['nombre'] = "";
    ?>
    <form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Nombre del alumno:
        <input type="text" name="nombre" value="<?php echo $_POST['nombre']; ?>"/>
        <?php
        /* si ha pulsado el botón enviar y el campo del nombre está vacío muestra
         msg de error*/
        if (isset($_POST['enviar']) && empty($_POST['nombre']))
            echo "<span style='color:red'> &lt;-- Debe introducir un nombre!!</span>"

        ?>
        <br/>
        <p>Módulos que cursa:
            <?php
            /* si ha pulsado el botón enviar y no se ha seleccionado ningún checkbox
             msg de error*/

            if (isset($_POST['enviar']) && empty($_POST['modulos']))
                echo "<span style='color:red'> &lt;-- Debe escoger al menos uno!!</span>"
            ?>
        </p>
        <input type="checkbox" name="modulos[]" value="DWES"
            <?php
            /* comprueba si existe en el array de checkbox el valor "DWES", lo que
             * indicaría que se había seleccionado este checkbox puesto que existe.
             * De ser así loe pone el atributo checked para que aparezca marcado
             * Se hace lo mismo con el otro.
             */
            if (isset($_POST['modulos']) && in_array("DWES", $_POST['modulos']))
                echo 'checked="checked"';
            ?>
        />Desarrollo web en entorno servidor
        <br/>
        <input type="checkbox" name="modulos[]" value="DWEC"
            <?php
            if (isset($_POST['modulos']) && in_array("DWEC", $_POST['modulos']))
                echo 'checked="checked"';
            ?>
        />Desarrollo web en entorno cliente<br/>
        <br/>
        <input type="submit" value="Enviar" name="enviar"/>
    </form>
    <?php
} //llave del else
?>
</body>
</html>