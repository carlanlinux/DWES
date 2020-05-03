<?php
// Verifica que nos han pasado todos los datos
if (($_POST["valor1"] == "") || ($_POST["valor2"] == "") || ($_POST["operar"] == "")) {
    // Indicamos al browser que carge de nuevo la página HTML de la calculadora
    header("Location: calculadora.html");
    // Indicamos al procesador de PHP no siga adelante
    exit;
}
$result = "";
//comprobamos si los datos valor1 y valor2 son números
if (is_numeric($_REQUEST['valor1']) && is_numeric($_REQUEST['valor2'])) {
    if (isset($_REQUEST['check1'])) {
        $suma = $_REQUEST['valor1'] + $_REQUEST['valor2'];
        $result .= "La suma es:" . $suma . "<br>";
    }
    if (isset($_REQUEST['check2'])) {
        $resta = $_REQUEST['valor1'] - $_REQUEST['valor2'];
        $result .= "La resta es:" . $resta . "<br>";

    }
    if (isset($_REQUEST['check3'])) {
        $multiplicacion = $_REQUEST['valor1'] * $_REQUEST['valor2'];
        $result .= "La multiplicación es:" . $multiplicacion . "<br>";

    }
    if (isset($_REQUEST['check4'])) {
        if ($_REQUEST['valor2'] != 0) {
            $division = $_REQUEST['valor1'] / $_REQUEST['valor2'];
            $result .= "La división es:" . $division . "<br>";
        } else {
            $result .= "el divisor es 0, no se realiza la división <br>";
        }

    }
} else {
    $result = "No se ha podido realizar la operación. Los datos han de ser"
        . " números";
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<p>El resultado es <?= $result ?></p>
</body>
</html>
