<?php

if (!empty($_POST)) {
    if (isset($_POST['txtNombre']) && isset($_POST['txtApellidos'])) {
        echo "Nombre: [" . $_POST['txtNombre'] . "]<br/>";
        echo "Apellidos: [" . $_POST['txtApellidos'] . "]<br/>";
        echo "Edad: [" . $_POST['txtEdad'] . "]<br/>";
        if (isset($_POST['chkActivo']) == true)
            echo "Activo: [" . $_POST['chkActivo'] . "]<br/>";
    } else {
        echo "Introduzca todos los datos requeridos";
    }
    echo "<hr/>";
}
