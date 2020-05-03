<?php
//Carga el modelo
require_once('modelo.php');
//Abrimos la sesión.
session_start();

//Comprobamos que nos venga por post el username
if (isset($_POST['username'])) {
    //Asigno la variable post username al usuario y a la sesión.
    $username = $_SESSION['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    //si no existe usuario lo creamos.
    if (!existe_usuario($username)) crear_usuario($username);
}

//Comprobamos que tengamos el username en la sesión
if (isset($_SESSION['username'])) {
    $jugador['usuario'] = $_SESSION['username'];

    //Me abre la vista del tablero
    require "vista_tablero.php";

} else {
    //Mostramos la página del formulario de registro de jugador
    require "vista_userForm.php";
}
