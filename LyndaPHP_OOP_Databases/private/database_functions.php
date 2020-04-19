<?php

//Creamos la función para conectarnos a la base de datos creando un nuevo objeto mysqli y pasandole como argumento las
// constantes qeu hemos creado con los datos de la conexión a la BD
function db_connect ()
{
    $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME_LYNDA);
    //Antes de devolver el objeto de la base de datos lo que hacemos es comprobar que ha ido bien llamando a otro método
    confirm_db_connect($connection);
    return $connection;

}

//comprobamos que la conexión se haya compeltado con éxito, si no, devolvemos el error con un exit y pasando el mensaje
//como argumento
function confirm_db_connect ($connection)
{
    if ($connection->connect_errno) {
        $msg = "Database connection failed ";
        $msg .= $connection->connect_error;
        $msg .= " (" . $connection->connect_error . ")";
        exit($msg);
    }
}

function fb_disconnect ($connection)
{
    if (isset($connection)) $connection->close();
}