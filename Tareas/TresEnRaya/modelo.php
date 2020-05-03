<?php
//Solicitamos los ficheros que contienen las credenciales y las funciones de conexión a la BD y las clases
require_once "db_credentials.php";
require_once "db_connections.php";
require_once "Usuario.class.php";
require_once "Partida.class.php";

//Creamos una conexión a la base de datos
$database = db_connect();
//Le pasmos la base de datos a la clase usuario y partida para que realice las queries
Usuario::set_database($database);
Partida::set_database($database);

function crear_usuario ($username)
{
    if (existe_usuario($username)) return null;
    $usuario = new Usuario(['nombre_usuario' => $username]);
    //Devolvemos el usuario que hemos guardado ya con el ID de la base de datos
    return Usuario::guardar_usuario($usuario);
}

//Buscamos usuario, si existe nos lo devuelve, si no devuelve null
function buscar_usuario ($username)
{
    return Usuario::buscar_usuario($username);
}

//Devuelve si existe al usuario o no
function existe_usuario ($nombre_usuario)
{
    if (buscar_usuario($nombre_usuario) == null) {
        return false;
    } else {
        return true;
    }
}


function actualizar_usuario ($usuario)
{
    Usuario::actualizar_usuario($usuario);
}


function crear_partida (Usuario $objeto_usuario)
{
    $partida = new Partida(['id_usuario' => $objeto_usuario->id]);
    //Devolvemos el usuario que hemos guardado ya con el ID de la base de datos
    return Partida::guardar_partida($partida);
}

//Buscamos la partida, si existe nos lo devuelve, si no devuelve null
function buscar_partida (Usuario $objeto_usuario)
{
    return Partida::buscar_partida($objeto_usuario);
}

function actualizar_partida (Partida $partida)
{
    Partida::actualizar_partida($partida);
}
