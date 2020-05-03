<?php
/*
 * Devuelve true si existen TODAS las cookies, false en caso contrario.
 */
function hayCookie ()
{
    return isset($_COOKIE["nombre"]) && isset($_COOKIE["apellidos"])
        && isset($_COOKIE["fondo"]) && isset($_COOKIE["frente"])
        && isset($_COOKIE["letra"]);
}

/*
 * Devuelve true si han llegado TODOS los datos del formulario, false en caso contrario.
 */
function hayDatos ()
{
    return isset($_REQUEST["nombre"]) && isset($_REQUEST["apellidos"])
        && isset($_REQUEST["fondo"]) && isset($_REQUEST["frente"])
        && isset($_REQUEST["letra"]);
}

?>