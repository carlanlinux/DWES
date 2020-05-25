<?php
$servidor="localhost";
$usuario = "root";
$clave = "root";

$conexion = new mysqli($servidor, $usuario, $clave);
if ($conexion->connect_error) {
    die("Error de conexión.");
}

$sql = "CREATE DATABASE myDB ";

if ($conexion->query($sql) === true){
    echo "Base de datos myDB creada <br/>";
} else {
    echo "Error creando la base de datos";
}

$conexion->close();