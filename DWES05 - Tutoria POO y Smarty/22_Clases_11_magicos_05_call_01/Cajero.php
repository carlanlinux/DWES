<?php

class Cajero
{
    private $cajero = "8523";
    private $identificador;
    private $nombreCliente;
    private $documento = ['252423' => 'Maria',
        '10075658' => 'Pepito Perez'];

    public function __construct ($identificacion)
    {
        foreach ($this->documento as $key => $value) {
            if ($identificacion == $key) {
                $this->nombreCliente = $value;
                $this->identificador = $key;
                echo "Bienvenid@ $value al cajero automático<br><br>";
            }
        }
    }

    public static function __callStatic ($metodo, $parametros)
    {
        $mensaje = "Método __callStatic():<br> método llamado: $metodo<br> Parámetros: <br>";
        foreach ($parametros as $parametro) {
            $mensaje .= "$parametro <br>";
        }
        echo "$mensaje <br>";
    }

    public function __call ($metodo, $parametros)
    {
        $mensaje = "Método __call(): <br> método llamado: $metodo <br> Parámetros:  <br>";
        foreach ($parametros as $parametro) {
            $mensaje .= "$parametro  <br>";
        }
        echo "$mensaje <br>";
    }

    public function __destruct ()
    {
        echo "Fin de la operación $this->nombreCliente <br>";
    }
} 

