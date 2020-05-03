<?php
include "practica1-comprobar.php";
include "practica1-guardar.php";
//nos dice si tenemos preferencias de usuario
$hayPreferencias = true;
$aConf = null;
/*
 * Si no hay cookies mira si hay datos del formulario. Si no hay datos
 * pone la variable preferencias a false. Si los hay los guarda en un array.
 *
 * Si hay datos de cookies los guarda en un array
 */
if (hayCookie() == false) {
    if (hayDatos() == false) {
        $hayPreferencias = false;
    } else {
        $aConf = guardarDatos($_REQUEST);
    }
} else {
    $aConf = guardarDatos($_COOKIE);
}
if ($hayPreferencias == false)
    //si no tenemos preferencias, volvemos al formulario
    header("location:practica1-index.php");
else {
    //grabar cookies con las preferencias de usuario, caducidad 1 día
    setcookie("nombre", $aConf["nombre"], time() + 60 * 60 * 24);
    setcookie("apellidos", $aConf["apellidos"], time() + 60 * 60 * 24);
    setcookie("fondo", $aConf["fondo"], time() + 60 * 60 * 24);
    setcookie("frente", $aConf["frente"], time() + 60 * 60 * 24);
    setcookie("letra", $aConf["letra"], time() + 60 * 60 * 24);
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Saludo</title>
    <!--cogemos las tipografías de google-->
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Slabo+27px|Roboto' rel='stylesheet'
          type='text/css'>
    <style>
        /* asignamos el color de fondo, el color de texto y la tipografía */
        body {
            background-color: <?=$aConf["fondo"];?>;
            color: <?=$aConf["frente"];?>;
            font-family: <?=$aConf["letra"];?>;
        }

        a {
            background-color: <?=$aConf["fondo"];?>;
            color: <?=$aConf["frente"];?>;
        }
    </style>
</head>
<body>
<h1>Hola <?= $aConf["nombre"] . " " . $aConf["apellidos"]; ?></h1>

<p><a href="practica1-borrar.php">Borrar cookies y volver a cambiar las preferencias</a></p>
</body>
</html>