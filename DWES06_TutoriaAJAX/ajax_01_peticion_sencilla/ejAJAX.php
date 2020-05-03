<?php
//cargamos lo que queramos que tenga la respuesta en una variable (puede ser código html, etc)
$respuesta = "NOMBRE DEL SERVIDOR: " . $_SERVER['SERVER_NAME'] . ", DIRECCIÓN DEL SERVIDOR: "
    . $_SERVER['SERVER_ADDR'];
//haciendo este echo estás respondiendo la solicitud ajax
echo $respuesta;
?>