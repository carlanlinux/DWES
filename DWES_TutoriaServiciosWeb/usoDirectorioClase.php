<?php

include "Library.class.php";

//En una variable guardamos un array con las opciones que le paso al servidor, la única que necesito es la URI del servicio

$options = array('uri' => 'http://localhost/DWES/DWES_TutoriaServiciosWeb/');

//Creamos un objeto soap donde ponemos null porque no tenemos el USDL
$server = new SoapServer(NULL, $options);

$server->setClass('Library');
$server->handle();