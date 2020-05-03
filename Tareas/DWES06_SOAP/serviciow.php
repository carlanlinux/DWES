<?php
//Incluimos el fichero que contiene la clase con las funciones soap
include "funcionesSoap.class.php";

$miWSDL = "http://localhost:8888/DWES/Tareas/DWES06_SOAP/Tarea_WSDL.wsdl";
$servidor = new SoapServer($miWSDL);

//Como estamos trabajando con clases establecemos cual es la clase donde se ofrecen los servicios mediante método setClass()
$servidor->setClass("FuncionesSoap");

/* activamos el servicio con el método handle()*/
$servidor->handle();

?>
