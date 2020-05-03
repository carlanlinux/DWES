<?php


class servicioGenerado
{
    private static $classmap = array();
    var $soapClient;

    function __construct ($url = 'http://localhost:8888/DWES/Tareas/DWES06_SOAP/Tarea_WSDL.wsdl')
    {
        $this->soapClient = new SoapClient($url, array("classmap" => self::$classmap, "trace" => true, "exceptions" => true));
    }

    function getPVP (string $string)
    {

        $int = $this->soapClient->getPVP($string);
        return $int;

    }

    function getStock (string $string, int $int)
    {

        $int = $this->soapClient->getStock($string, $int);
        return $int;

    }

    function getFamilias ()
    {

        $array = $this->soapClient->getFamilias();
        return $array;

    }

    function getProductosFamilias (string $string)
    {

        $array = $this->soapClient->getProductosFamilias($string);
        return $array;

    }
}


