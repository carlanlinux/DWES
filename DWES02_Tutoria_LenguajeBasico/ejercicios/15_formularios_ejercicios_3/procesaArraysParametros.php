<?php
// campos de texto
$textoSimple = '';
$listaTextoArray = '';

/*si tienen el mismo nombre, y no lo pasa como array coge el último
 * si intenta acceder como array da error
 */
if (isset($_REQUEST['textoSimple'])) {
    $textoSimple = $_REQUEST['textoSimple'];
}
/* pasado como array*/
if (isset($_REQUEST['textoArray'])) {
    foreach ($_REQUEST['textoArray'] as $opcionSeleccionada) {
        $listaTextoArray .= $opcionSeleccionada . ' ';
    }
}

// checkboxes
$cbSimple = '';
$listaCbArray = '';
/*si tienen el mismo nombre, y no lo pasa como array coge el último
 * si intenta acceder como array da error
 */
if (isset($_REQUEST['cbSimple'])) {
    $cbSimple = $_REQUEST['cbSimple'];
}
/* paSado como array, LLEGAN LOS MARCADOS*/
if (isset($_REQUEST['cbArray'])) {
    foreach ($_REQUEST['cbArray'] as $opcionSeleccionada) {
        $listaCbArray .= $opcionSeleccionada . ' ';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<body>
Texto Simple: <?php echo $textoSimple; ?> <br/>
Lista Texto Array: <?php echo $listaTextoArray; ?> <br/>
<hr/>
Cb Simple: <?php echo $cbSimple; ?> <br/>
Lista Cb Array: <?php echo $listaCbArray; ?> <br/>
</body>
</html>