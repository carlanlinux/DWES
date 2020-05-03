<?php
/* Comprobar si el formulario fue enviado (si se pulsó el botón enviar)
 */
if (isset($_GET['btnEnviar'])) {
    echo "<p>Contenido del array asociativo con la información del "
        . "formulario:</p>";
    print_r($_GET);
    echo "<p/>";
    echo "Primer texto: [" . $_GET['txtPrimero'] . "]<br/>";
    echo "Segundo texto: [" . $_GET['txtSegundo'] . "]<br/>";
    echo "<hr/>";
} else {
    echo "No hay datos del formulario <br/>";
}
?>
